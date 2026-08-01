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

        if ($request->has('postcode') && !$request->has('Postcode')) {
            $data['Postcode'] = $request->postcode;
        }

        if($request->hasFile('image')){
            $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('members'), $imageName);
            $data['image'] = $imageName;
        }

        $member = Member::create($data);

        // Send automated registration confirmation email to member
        try {
            Mail::send('emails.registration_confirmation', ['member' => $member], function ($message) use ($member) {
                $message->to($member->email)
                        ->subject('Registration Confirmation - Bihari Muslims UK');
            });
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Registration confirmation email error: ' . $e->getMessage());
        }

        // Send admin notification
        try {
            Mail::raw("A new member has registered.\n\nName: {$member->name}\nEmail: {$member->email}\nPhone: {$member->phone}", function ($message) {
                $message->to('info@iharimuslim.co.uk')
                        ->subject('New Member Registration');
            });
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Admin registration notification error: ' . $e->getMessage());
        }

        // Auto-login member
        session(['member_id' => $member->id, 'member_name' => $member->name]);

        $msg = 'Registration completed successfully! Welcome, ' . $member->name . '. A confirmation email has been sent to ' . $member->email . '.';
        session()->flash('success', $msg);
        return redirect('/profile')->with('success', $msg);
    }

    public function profile()
    {
        if (!session()->has('member_id')) {
            return redirect('/login')->with('error', 'Please log in to view your profile.');
        }
        $user = Member::find(session()->get('member_id'));
        return view('members.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $memberId = session()->get('member_id');
        if (!$memberId) {
            return redirect('/login')->with('error', 'Please log in to update your profile.');
        }

        $user = Member::findOrFail($memberId);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $user->id,
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->uk_location = $request->uk_location;
        $user->Postcode = $request->postcode ?? $request->Postcode;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imageName = time() . '_' . rand(100, 999) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('members'), $imageName);
            $user->image = $imageName;
        }

        // Password optional
        if ($request->password) {
            $user->password = $request->password;
        }

        $user->save();

        session(['member_name' => $user->name]);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function member_login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $member = Member::where('email', $request->email)->first();

        // if($member && $member->status != 1) {
        //     return back()->with('error', 'Your account is pending approval. Please wait for admin approval.');
        // }
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

