<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>My Profile - Bihari Muslims</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<style>
    body {
        background-color: #f4f6fa;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: #2d3748;
    }

    .navbar {
        top: 0 !important;
        margin-bottom: 30px !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    /* ── Main Container ── */
    .profile-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 12px 35px rgba(48, 70, 162, 0.08);
        background: #ffffff;
        overflow: hidden;
        margin-bottom: 40px;
    }

    /* ── Profile Header ── */
    .profile-header {
        background: linear-gradient(135deg, #4C6BE9 0%, #3046A2 100%);
        padding: 38px 20px 30px 20px;
        text-align: center;
        position: relative;
    }

    .avatar-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 12px;
    }

    .header-avatar-img {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .auto-avatar {
        width: 110px;
        height: 110px;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        color: #ffffff;
        font-size: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-weight: 800;
        border: 4px solid #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .profile-header h5 {
        color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 1.4rem;
        margin-top: 6px;
        margin-bottom: 2px;
        letter-spacing: -0.2px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .profile-header small {
        color: rgba(255, 255, 255, 0.88) !important;
        font-size: 0.92rem;
        font-weight: 500;
    }

    /* ── Form Styling ── */
    .card-body-custom {
        padding: 35px 40px;
    }

    .section-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #3046A2;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-bottom: 2px solid #edf2f7;
        padding-bottom: 10px;
    }

    .section-title i {
        color: #4C6BE9;
        font-size: 1.1rem;
    }

    .form-label {
        font-size: 0.86rem;
        font-weight: 700;
        color: #4a5568;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control-custom {
        height: 48px;
        border-radius: 12px;
        border: 1.5px solid #e2e8f0;
        font-size: 0.95rem;
        padding: 10px 16px;
        color: #2d3748;
        background-color: #f8fafc;
        transition: all 0.2s ease-in-out;
    }

    .form-control-custom:focus {
        background-color: #ffffff;
        border-color: #4C6BE9;
        box-shadow: 0 0 0 4px rgba(76, 107, 233, 0.12);
        outline: none;
    }

    /* ── Profile Image Upload Box ── */
    .image-upload-card {
        background: #f8fafc;
        border: 2px dashed #cbd5e1;
        border-radius: 14px;
        padding: 16px;
        transition: border-color 0.2s;
    }

    .image-upload-card:hover {
        border-color: #4C6BE9;
    }

    .custom-file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .preview-thumb {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #4C6BE9;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    /* ── Buttons ── */
    .btn-gradient-save {
        background: linear-gradient(90deg, #4C6BE9, #3046A2);
        color: #ffffff !important;
        border: none;
        border-radius: 12px;
        padding: 12px 32px;
        font-weight: 700;
        font-size: 0.98rem;
        cursor: pointer;
        box-shadow: 0 6px 18px rgba(76, 107, 233, 0.3);
        transition: all 0.2s ease;
    }

    .btn-gradient-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(76, 107, 233, 0.4);
        opacity: 0.95;
    }

    .btn-gradient-save:active {
        transform: translateY(0);
    }

    .btn-back {
        background: #edf2f7;
        color: #4a5568 !important;
        font-weight: 600;
        border-radius: 12px;
        padding: 12px 24px;
        border: none;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #2d3748 !important;
    }

    @media (max-width: 768px) {
        .card-body-custom {
            padding: 24px 20px;
        }
    }
</style>
</head>

<body>

@include('layouts.navbar')

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-11">
            <div class="card profile-card">
                @php
                    use Illuminate\Support\Facades\File;
                    $hasProfileImg = !empty($user->image) && File::exists(public_path('members/' . $user->image));
                @endphp

                <!-- Header -->
                <div class="profile-header text-center">
                    <div class="avatar-wrapper">
                        @if($hasProfileImg)
                            <img src="{{ asset('members/' . $user->image) }}"
                                id="headerAvatarImg"
                                class="header-avatar-img" alt="{{ $user->name }}">
                        @else
                            <div class="auto-avatar" id="headerAvatarPlaceholder">
                                {{ strtoupper(substr($user->name ?? 'M', 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <h5>{{ $user->name }}</h5>
                    <small><i class="fas fa-envelope mr-1 opacity-75"></i> {{ $user->email }}</small>
                </div>

                <div class="card-body-custom">

                    <!-- Alerts -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-lg mb-4" role="alert" style="background:#e6fffa; color:#234e52; border-left: 4px solid #319795 !important;">
                            <i class="fas fa-check-circle mr-2 text-teal"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger border-0 shadow-sm rounded-lg mb-4" style="background:#fff5f5; color:#742a2a; border-left: 4px solid #e53e3e !important;">
                            <i class="fas fa-exclamation-circle mr-2"></i> <strong>Please resolve the following errors:</strong>
                            <ul class="mb-0 mt-2 pl-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/profile-update" enctype="multipart/form-data">
                        @csrf

                        <!-- SECTION 1: PERSONAL INFORMATION -->
                        <div class="section-title">
                            <i class="fas fa-user-circle"></i> Personal Information
                        </div>

                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control form-control-custom"
                                    value="{{ old('name', $user->name) }}" placeholder="Enter full name" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-custom"
                                    value="{{ old('email', $user->email) }}" placeholder="you@example.com" required>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control form-control-custom"
                                    value="{{ old('phone', $user->phone) }}" placeholder="+44 7000 000000">
                            </div>
                        </div>

                        <!-- SECTION 2: LOCATION DETAILS -->
                        <div class="section-title mt-4">
                            <i class="fas fa-map-marker-alt"></i> Location Details
                        </div>

                        <div class="row">
                            <!-- Bihar Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bihar Location</label>
                                <input type="text" name="location" class="form-control form-control-custom"
                                    value="{{ old('location', $user->location) }}" placeholder="District / Village in Bihar">
                            </div>

                            <!-- UK Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">UK Location</label>
                                <input type="text" name="uk_location" class="form-control form-control-custom"
                                    value="{{ old('uk_location', $user->uk_location) }}" placeholder="City / Town in UK">
                            </div>

                            <!-- Postcode -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Postcode</label>
                                <input type="text" name="postcode" class="form-control form-control-custom"
                                    value="{{ old('postcode', $user->Postcode ?? $user->postcode) }}" placeholder="e.g. SW1A 1AA">
                            </div>
                        </div>

                        <!-- SECTION 3: PROFILE PICTURE -->
                        <div class="section-title mt-4">
                            <i class="fas fa-camera"></i> Profile Picture
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="image-upload-card">
                                    <div class="d-flex align-items-center flex-wrap gap-3" style="gap: 16px;">
                                        <div>
                                            @if($hasProfileImg)
                                                <img src="{{ asset('members/' . $user->image) }}"
                                                    id="profileImagePreview"
                                                    class="preview-thumb" alt="Profile Preview">
                                            @else
                                                <img src="" id="profileImagePreview"
                                                    class="preview-thumb" style="display:none;" alt="Profile Preview">
                                                <div id="noImageBadge" class="d-flex align-items-center justify-content-center bg-light text-secondary rounded-circle" style="width:64px; height:64px; border:2px dashed #cbd5e1;">
                                                    <i class="fas fa-user fa-lg"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex-grow-1">
                                            <label class="form-label mb-1">Upload New Photo</label>
                                            <input type="file" name="image" id="profileImageInput"
                                                class="form-control-file form-control-custom" accept="image/*" style="padding: 8px;">
                                            <small class="text-muted d-block mt-1">Supported formats: JPG, PNG, WEBP (Max: 4MB)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTONS -->
                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                            <a href="/" class="btn btn-back">
                                <i class="fas fa-arrow-left mr-2"></i> Back
                            </a>

                            <button type="submit" class="btn btn-gradient-save">
                                <i class="fas fa-save mr-2"></i> Save Changes
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('profileImageInput').addEventListener('change', function(e) {
        var file = e.target.files[0];
        var preview = document.getElementById('profileImagePreview');
        var badge = document.getElementById('noImageBadge');
        if (file) {
            var url = URL.createObjectURL(file);
            preview.src = url;
            preview.style.display = 'block';
            if (badge) badge.style.display = 'none';

            // Also update header preview avatar
            var headerImg = document.getElementById('headerAvatarImg');
            if (headerImg) {
                headerImg.src = url;
            }
        }
    });
</script>

</body>
</html>