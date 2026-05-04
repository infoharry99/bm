<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #1a1a2e;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar .nav-link:hover {
            color: #e9d11f !important;
        }

        /* Center content below navbar */
        .page-wrapper {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-custom {
            border-radius: 10px;
            background: #1d2671;
            color: #fff;
        }

        .btn-custom:hover {
            background: #c33764;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #1d2671;
        }
    </style>
</head>

<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark px-4">
    <!-- <a class="navbar-brand text-white" href="/">Your Logo</a> -->

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/member" class="nav-link">Members</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>

            @if(session()->has('member_id'))
                <li class="nav-item"><a href="/profile" class="nav-link">{{ session()->get('member_name') }}</a></li>
                <li class="nav-item"><a href="/member-logout" class="nav-link">Logout</a></li>
            @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endif
        </ul>
    </div>
</nav>

<!-- ✅ Page Content -->
<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">

                <div class="card p-4">

                    <div class="text-center mb-3">
                        <div class="logo">Forgot Password</div>
                        <p class="text-muted small">Enter your email to reset password</p>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/forgot-password">
                        @csrf

                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-custom">
                                Send Reset Link
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="/login" class="text-decoration-none">Back to Login</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>