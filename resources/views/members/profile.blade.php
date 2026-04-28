<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>My Profile</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
        }

        .profile-card {
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            border-radius: 10px;
        }

        .profile-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }
    </style>
    
<style>

    .navbar {
        top: 0 !important;
        margin-bottom: 20px !important;
    }

    /* ── Member Cards ── */
    .member-card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        padding: 20px;
        transition: 0.3s;
        background: #fff;
    }

    .member-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .member-img {
        height: 180px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .auto-avatar {
        width: 120px;
        height: 120px;
        background: #0D8ABC;
        color: #fff;
        font-size: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-weight: bold;
    }

    /* ── Form Card ── */
    .form-card {
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        padding: 30px;
    }

    .form-card h4 {
        font-weight: 700;
        color: #3046A2;
        margin-bottom: 24px;
    }

    /* ── Labels & Required Star ── */
    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #555;
        margin-bottom: 4px;
    }

    .req {
        color: #c94040;
        margin-left: 2px;
    }

    /* ── Inputs ── */
    .form-control {
        border-radius: 8px;
        border: 1px solid #dde1f0;
        font-size: 14px;
        padding: 9px 12px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
        border-color: #4C6BE9;
        box-shadow: 0 0 0 3px rgba(76,107,233,0.15);
        outline: none;
    }

    .form-control.is-invalid-custom {
        border-color: #c94040 !important;
        box-shadow: 0 0 0 3px rgba(201,64,64,0.12) !important;
    }

    .form-control.is-valid-custom {
        border-color: #2a8c5f !important;
    }

    /* ── Hint / Error messages ── */
    .field-hint {
        font-size: 12px;
        min-height: 16px;
        margin-top: 3px;
        color: #888;
    }

    .field-hint.err { color: #c94040; }
    .field-hint.suc { color: #2a8c5f; }

    /* ── Image Preview ── */
    .preview-wrap {
        display: none;
        align-items: center;
        gap: 14px;
        margin-top: 10px;
    }

    .preview-avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        border: 2px solid #dde1f0;
        object-fit: cover;
        display: none;
    }

    .preview-filename {
        font-size: 13px;
        color: #666;
    }

    /* ── Gradient Button ── */
    .gradient-btn {
        background: linear-gradient(90deg, #4C6BE9, #3046A2);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 11px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: opacity 0.15s, transform 0.1s;
        width: 100%;
    }

    .gradient-btn:hover  { opacity: 0.91; }
    .gradient-btn:active { transform: scale(0.99); }
    .gradient-btn:disabled { opacity: 0.5; cursor: not-allowed; }

    /* ── Page heading ── */
    h2 { font-weight: 700; color: #3046A2; }

</style>
</head>

<body>

@include('layouts.navbar')

<div class="page-wrapper mt-5">
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-6">
            <div class="card profile-card mb-4">
                <!-- Header -->
                <div class="profile-header text-center">
                    <div class="auto-avatar mb-2">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>
                    <h5 class="mb-0">{{ $user->name }}</h5>
                    <small>{{ $user->email }}</small>
                </div>

                <div class="card-body">

                    <!-- Alerts -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/profile-update">
                        @csrf

                        <!-- BASIC INFO -->
                        <h6 class="mb-3 text-primary">Basic Information</h6>

                        <div class="row">

                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $user->name }}" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $user->email }}" required>
                            </div>

                            <!-- Bihar Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bihar Location</label>
                                <input type="text" name="location" class="form-control"
                                    value="{{ $user->location }}">
                            </div>

                            <!-- UK Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">UK Location</label>
                                <input type="text" name="uk_location" class="form-control"
                                    value="{{ $user->uk_location }}">
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ $user->phone }}">
                            </div>

                            <!-- Postcode -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Postcode</label>
                                <input type="text" name="postcode" class="form-control"
                                    value="{{ $user->Postcode }}">
                            </div>

                            <!-- Profile Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="image" class="form-control">

                                @if($user->image)
                                    <img src="{{ asset('uploads/'.$user->image) }}"
                                        class="mt-2"
                                        style="width:70px; height:70px; border-radius:50%;">
                                @endif
                            </div>

                        </div>
                        <hr>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between mt-3">
                            <a href="/" class="btn btn-light">Back</a>

                            <button type="submit" class="gradient-btn px-4">
                                <i class="fas fa-save mr-1"></i> Update Profile
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>