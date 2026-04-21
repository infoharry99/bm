<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerMail;

class VolunteerController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'reason' => 'required|string',
        ]);

        try {
            Mail::to('infoharry99@gmail.com')->send(new VolunteerMail($data));
            return back()->with('success', '✅ Thank you for volunteering! We will contact you soon.');
        } catch (\Exception $e) {
            return back()->with('error', '❌ Could not send email. Error: ' . $e->getMessage());
        }
    }
}
