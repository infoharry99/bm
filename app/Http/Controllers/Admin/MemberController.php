<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->paginate(20);
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function approveMember($id)
    {

        DB::table('members')->where('id', $id)->update(['status' => 1]);
        return back()->with('success', 'Member Approved Successfully!');
    }

    Public function rejectMember($id)
    {
        DB::table('members')->where('id', $id)->update(['status' => 0]);
        return back()->with('success', 'Member Rejected Successfully!');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email',
            'phone'    => 'nullable|string',
            'location' => 'nullable|string',
            'image'    => 'nullable|image|max:4096'
        ]);

        $data = $request->only(['name','email','phone','location']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = time().'_'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('members'), $name);
            $data['image'] = $name;
        }

        Member::create($data);

        return redirect()->route('admin.members.index')
                         ->with('success', 'Member Added Successfully!');
    }

    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email',
            'phone'    => 'nullable|string',
            'location' => 'nullable|string',
            'image'    => 'nullable|image|max:4096'
        ]);

        $data = $request->only(['name','email','phone','location']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = time().'_'.Str::random(5).'.'.$file->getClientOriginalExtension();
            // $file->storeAs('public/members', $name);
            $file->move(public_path('members'), $name);
            $data['image'] = $name;
        }

        $member->update($data);

        return redirect()->route('admin.members.index')
                         ->with('success', 'Member Updated Successfully!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return back()->with('success', 'Member Deleted Successfully!');
    }
}
