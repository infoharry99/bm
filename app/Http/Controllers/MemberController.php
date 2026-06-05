<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{

    public function messageForm($id)
    {
        if (!session()->has('member_id')) {
            return redirect('/login');
        }

        $member = Member::findOrFail($id);

        return view('members.message', compact('member'));
    }


    public function sendMessage(Request $request, $id)
    {
        if (!session()->has('member_id')) {
            return redirect('/login');
        }

        $request->validate([
            'message' => 'required'
        ]);

        $receiver = Member::findOrFail($id);

        $sender = Member::find(session()->get('member_id'));

        Mail::raw(
            "Message From: {$sender->name}\n".
            "Email: {$sender->email}\n\n".
            "Message:\n".$request->message,

            function ($mail) use ($receiver, $sender) {

                $mail->to($receiver->email)
                    ->subject('New Message From '.$sender->name);
            }
        );

        return redirect('/member')
            ->with('success', 'Message sent successfully!');
    }

    public function index() {
        $members = Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function store(Request $request) {
       $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:members,email',
            'phone'                 => 'required|unique:members,phone',
        ], [
            'email.unique'          => 'This email address is already registered.',
            'phone.unique'          => 'This phone number is already registered.',
            'consent.accepted'      => 'You must provide consent before registering.',
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('members'), $imageName);
            $data['image'] = $imageName;
        }

        $member = Member::create($data);
          Mail::raw("A new member has been created.

            Name: {$member->name}
            Email: {$member->email}", function ($message) {
                    $message->to('info@iharimuslim.co.uk')
                            ->subject('New Member Created');
                });

        session()->flash('success', 'Registration complete. Please wait for an admin to activate your account!');
        return back()->with('success','Registration complete. Please wait for an admin to activate your account!');
    }

    public function profile()
    {
        $user = Member::find(session()->get('member_id'));
        return view('members.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Member::find(session()->get('member_id'));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Password optional
        if ($request->password) {
            $user->status = 0;
            $user->password = $request->password;
        }

        $user->save();

        return back()->with('success', 'Profile updated');
    }

    public function member_login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $member = Member::where('email', $request->email)->first();

        if($member && $member->status != 1) {
            return back()->with('error', 'Your account is pending approval. Please wait for admin approval.');
        }
        if ($member && $member->password == $request->password) {
            // Store member info in session
            session(['member_id' => $member->id, 'member_name' => $member->name]);
            return redirect('/')->with('success', 'Logged in successfully!');
        }else{
            session()->flash('error', 'Invalid credentials');
            return redirect('/login')->with('error', 'Invalid credentials');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

