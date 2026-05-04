<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Member Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: white;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #1a1a2e !important;
            padding: 12px 20px;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar .nav-link:hover {
            color: #e0d63e !important;
        }

        /* Login Card */
        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 70px);
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            height: 45px;
        }

        .btn-login {
            background: #667eea;
            border: none;
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #5a67d8;
        }

        .forgot-link {
            font-size: 14px;
            text-align: right;
            display: block;
            margin-top: 10px;
        }

        .alert {
            font-size: 14px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/member" class="nav-link">Members</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>

            @if(session()->has('member_id'))
                <li class="nav-item"><a href="/profile" class="nav-link">{{session()->get('member_name')}}</a></li>
                <li class="nav-item"><a href="/member-logout" class="nav-link">Logout</a></li>
            @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endif
        </ul>
    </div>
</nav>

<!-- Login -->
<div class="login-container">
    <div class="login-card">
        <h2>Member Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('member.login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>

            <button class="btn btn-login btn-block text-white">Login</button>

            <a href="/forgot-password" class="forgot-link">Forgot Password?</a>
        </form>
    </div>
</div>

</body>
</html>