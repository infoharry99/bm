<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{

    // Show contact page
    public function index()
    {
        return view('contact');
    }

    // Store message
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        DB::table('contact_messages')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back()->with('success','Message sent successfully!');
    }
}