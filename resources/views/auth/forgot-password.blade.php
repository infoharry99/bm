<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background: white;
            min-height: 100vh;
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

</body>
</html>