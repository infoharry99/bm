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
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    /* ── Outer Wrapper & Top Margin Centering ── */
    .profile-outer-container {
        margin-top: 165px !important;
        margin-bottom: 60px !important;
    }

    /* ── Compact Profile Card Layout ── */
    .profile-card-compact {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 35px rgba(48, 70, 162, 0.1);
        background: #ffffff;
        overflow: hidden;
    }

    /* ── Left Sidebar Profile Badge ── */
    .profile-sidebar {
        background: linear-gradient(145deg, #4C6BE9 0%, #3046A2 100%);
        color: #ffffff;
        padding: 35px 20px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .sidebar-avatar {
        width: 105px;
        height: 105px;
        border-radius: 16px;
        object-fit: contain;
        background-color: #f1f5f9;
        border: 3px solid #ffffff;
        box-shadow: 0 6px 16px rgba(0,0,0,0.18);
    }

    .sidebar-avatar-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        font-size: 38px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid #ffffff;
        box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    }

    .profile-sidebar h5 {
        color: #ffffff !important;
        font-size: 1.25rem;
        font-weight: 700;
        margin-top: 10px;
        margin-bottom: 2px;
    }

    .profile-sidebar small {
        color: rgba(255, 255, 255, 0.85) !important;
        font-size: 0.84rem;
        word-break: break-all;
    }

    .upload-btn-label {
        background: rgba(255, 255, 255, 0.18);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        padding: 6px 16px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 14px;
        margin-bottom: 0;
    }

    .upload-btn-label:hover {
        background: #ffffff;
        color: #3046A2;
    }

    /* ── Right Form Grid ── */
    .form-panel {
        padding: 28px 32px;
    }

    .form-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #3046A2;
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid #edf2f7;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label-compact {
        font-size: 0.76rem;
        font-weight: 700;
        color: #4a5568;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .form-control-compact {
        height: 38px;
        border-radius: 8px;
        border: 1.5px solid #e2e8f0;
        font-size: 0.88rem;
        padding: 6px 12px;
        color: #2d3748;
        background-color: #f8fafc;
        transition: all 0.15s ease-in-out;
    }

    .form-control-compact:focus {
        background-color: #ffffff;
        border-color: #4C6BE9;
        box-shadow: 0 0 0 3px rgba(76, 107, 233, 0.12);
        outline: none;
    }

    .btn-gradient-compact {
        background: linear-gradient(90deg, #4C6BE9, #3046A2);
        color: #ffffff !important;
        border: none;
        border-radius: 8px;
        padding: 8px 24px;
        font-weight: 700;
        font-size: 0.88rem;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(76, 107, 233, 0.25);
        transition: all 0.15s ease;
    }

    .btn-gradient-compact:hover {
        opacity: 0.95;
        transform: translateY(-1px);
    }

    .btn-back-compact {
        background: #edf2f7;
        color: #4a5568 !important;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 18px;
        font-size: 0.88rem;
        border: none;
        transition: all 0.15s ease;
    }

    .btn-back-compact:hover {
        background: #e2e8f0;
    }
</style>
</head>

<body>

@include('layouts.navbar')

<div class="container profile-outer-container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11">
            <div class="card profile-card-compact">
                @php
                    use Illuminate\Support\Facades\File;
                    $hasProfileImg = !empty($user->image) && File::exists(public_path('members/' . $user->image));
                @endphp

                <form method="POST" action="/profile-update" enctype="multipart/form-data">
                    @csrf

                    <div class="row no-gutters">
                        <!-- LEFT SIDEBAR: Photo & Member Info -->
                        <div class="col-md-4">
                            <div class="profile-sidebar">
                                @if($hasProfileImg)
                                    <img src="{{ asset('members/' . $user->image) }}"
                                        id="sidebarAvatarImg"
                                        class="sidebar-avatar" alt="{{ $user->name }}">
                                @else
                                    <div class="sidebar-avatar-placeholder" id="sidebarAvatarPlaceholder">
                                        {{ strtoupper(substr($user->name ?? 'M', 0, 1)) }}
                                    </div>
                                    <img src="" id="sidebarAvatarImg" class="sidebar-avatar" style="display:none;" alt="Preview">
                                @endif

                                <h5>{{ $user->name }}</h5>
                                <small><i class="fas fa-envelope mr-1 opacity-75"></i> {{ $user->email }}</small>

                                <!-- Change Photo Button -->
                                <label for="profileImageInput" class="upload-btn-label">
                                    <i class="fas fa-camera mr-1"></i> Change Photo
                                </label>
                                <input type="file" name="image" id="profileImageInput" accept="image/*" class="d-none">
                                <small class="mt-2 text-white-50" style="font-size: 0.72rem;">JPG, PNG or WEBP</small>
                            </div>
                        </div>

                        <!-- RIGHT MAIN PANEL: Compact Form Fields -->
                        <div class="col-md-8">
                            <div class="form-panel">
                                <div class="form-title">
                                    <i class="fas fa-user-edit text-primary"></i> Edit Profile
                                </div>

                                <!-- Alerts -->
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show p-2 mb-3 border-0 rounded" role="alert" style="background:#e6fffa; color:#234e52; font-size:0.85rem;">
                                        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                                        <button type="button" class="close p-2" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(isset($errors) && $errors->any())
                                    <div class="alert alert-danger p-2 mb-3 border-0 rounded" style="background:#fff5f5; color:#742a2a; font-size:0.85rem;">
                                        <i class="fas fa-exclamation-circle mr-1"></i> 
                                        @foreach ($errors->all() as $error)
                                            <span>{{ $error }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Row 1: Name & Email -->
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label class="form-label-compact">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control form-control-compact"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <div class="form-group col-md-6 mb-2">
                                        <label class="form-label-compact">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control form-control-compact"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>

                                <!-- Row 2: Phone & Postcode -->
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label class="form-label-compact">Phone Number</label>
                                        <input type="text" name="phone" class="form-control form-control-compact"
                                            value="{{ old('phone', $user->phone) }}" placeholder="+44 7000 000000">
                                    </div>

                                    <div class="form-group col-md-6 mb-2">
                                        <label class="form-label-compact">Postcode</label>
                                        <input type="text" name="postcode" class="form-control form-control-compact"
                                            value="{{ old('postcode', $user->Postcode ?? $user->postcode) }}" placeholder="e.g. SW1A 1AA">
                                    </div>
                                </div>

                                <!-- Row 3: Bihar Location & UK Location -->
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label class="form-label-compact">Bihar Location</label>
                                        <input type="text" name="location" class="form-control form-control-compact"
                                            value="{{ old('location', $user->location) }}" placeholder="District / Village">
                                    </div>

                                    <div class="form-group col-md-6 mb-2">
                                        <label class="form-label-compact">UK Location</label>
                                        <input type="text" name="uk_location" class="form-control form-control-compact"
                                            value="{{ old('uk_location', $user->uk_location) }}" placeholder="City / Town">
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <a href="/" class="btn btn-back-compact">
                                        <i class="fas fa-arrow-left mr-1"></i> Back
                                    </a>

                                    <button type="submit" class="btn btn-gradient-compact">
                                        <i class="fas fa-save mr-1"></i> Save Changes
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('profileImageInput').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var url = URL.createObjectURL(file);
            var avatarImg = document.getElementById('sidebarAvatarImg');
            var placeholder = document.getElementById('sidebarAvatarPlaceholder');

            if (avatarImg) {
                avatarImg.src = url;
                avatarImg.style.display = 'block';
            }
            if (placeholder) {
                placeholder.style.display = 'none';
            }
        }
    });
</script>

</body>
</html>