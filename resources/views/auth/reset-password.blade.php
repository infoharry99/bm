<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-custom {
            border-radius: 10px;
            background: #42275a;
            color: #fff;
        }

        .btn-custom:hover {
            background: #734b6d;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
                 @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            <div class="card p-4">

                <h4 class="text-center mb-3">Reset Password</h4>

              

                <form method="POST" action="/reset-password">
                    @csrf

                    <input type="hidden" name="token" value="{{ request()->token }}">

                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom">
                            Reset Password
                        </button>
                    </div>

                </form>

                <div class="text-center mt-3">
                    <a href="/login">Back to Login</a>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>