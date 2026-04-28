<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = Member::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found');
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        $link = url('/reset-password/' . $token);

        // Send mail
        Mail::raw("Click to reset password: $link", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Password');
        });

        return back()->with('success', 'Reset link sent to your email');
    }

    public function resetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
        if($request->password != $request->password_confirmation) {
            return back()->with('error', 'Passwords do not match');
        }
        if(strlen($request->password) < 8) {
            return back()->with('error', 'Password must be at least 8 characters');
        }

        $checkToken = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$checkToken) {
            return back()->with('error', 'Invalid token');
        }

        $user = Member::where('email', $checkToken->email)->update([
                    'status' => 0,
                    'password' => $request->password
                ]);
        return redirect('/login')->with('success', 'Password reset successfully!');
    }

}