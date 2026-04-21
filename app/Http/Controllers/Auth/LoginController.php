<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // ✅ Must be public to override default behavior
    public function redirectTo()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return '/admin/dashboard';
        } elseif ($user->role == 'member') {
            return '/';
        }

        return '/home';
    }
}
