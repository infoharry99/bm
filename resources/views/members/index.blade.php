<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Members</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<style>

    .navbar {
        top: 0 !important;
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

    .gradient-btn:hover { opacity: 0.91; }
    .gradient-btn:active { transform: scale(0.99); }
    .gradient-btn:disabled { opacity: 0.5; cursor: not-allowed; }

    /* ── Page heading ── */
    h2 {
        font-weight: 700;
        color: #3046A2;
    }

    /* ── Search section ── */
    .search-area {
        max-width: 460px;
        margin: 0 auto;
    }

</style>

</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">

    <h2 class="text-center mb-4">Members</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif
    <!-- ══════════════════════════════════
         ADD MEMBER FORM
    ══════════════════════════════════ -->
    <div class="form-card mb-5">

        <h4> New Member</h4>

        <form
            action="{{ route('member.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="memberForm"
            novalidate
        >
            @csrf

            <div class="row">

                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name <span class="req">*</span></label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="Full name"
                        required
                    >
                    <div class="field-hint" id="name-hint"></div>
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email <span class="req">*</span></label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="you@example.com"
                        required
                    >
                    <div class="field-hint" id="email-hint"></div>
                </div>

                  <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password <span class="req">*</span></label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Min. 8 characters"
                        required
                    >
                    <div class="field-hint" id="password-hint"></div>
                </div>

                <!-- Confirm Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirm Password <span class="req">*</span></label>
                    <input
                        type="password"
                        name="confirm_password"
                        id="confirm_password"
                        class="form-control"
                        placeholder="Repeat password"
                        required
                    >
                    <div class="field-hint" id="confirm-hint"></div>
                </div>

                  <!-- Bihar Location -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bihar Location<span class="req">*</span></label>
                    <input
                        type="text"
                        name="bihar_location"
                        class="form-control"
                        placeholder="District / village"
                        required
                    >
                    <div class="field-hint"></div>
                </div>

                <!-- UK Location -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">UK Location<span class="req">*</span></label>
                    <input
                        type="text"
                        name="uk_location"
                        class="form-control"
                        placeholder="City / town"
                        required
                    >
                    <div class="field-hint"></div>
                </div>
                <!-- Phone -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone <span class="req">*</span></label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        class="form-control"
                        placeholder="+44 7700 000000"
                        required
                    >
                    <div class="field-hint" id="phone-hint"></div>
                </div>

                <!-- Postcode -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Postcode <span class="req">*</span></label>
                    <input
                        type="text"
                        name="postcode"
                        id="postcode"
                        class="form-control"
                        placeholder="SW1A 1AA"
                        required
                    >
                    <div class="field-hint" id="postcode-hint"></div>
                </div>

            

                <!-- Profile Image with Preview -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profile Image</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control"
                        accept="image/*"
                    >
                    <div class="preview-wrap" id="previewWrap">
                        <img src="" alt="Preview" class="preview-avatar" id="previewImg">
                        <span class="preview-filename" id="previewName"></span>
                    </div>
                    <div class="field-hint">JPG, PNG or WebP. Optional.</div>
                </div>

                <!-- Submit -->
                <div class="col-md-6 mb-3 ">
                    <button type="submit" class="gradient-btn" id="submitBtn">
                        Add Member
                    </button>
                </div>

            </div><!-- /.row -->

        </form>
    </div><!-- /.form-card -->

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif  
  @php use Illuminate\Support\Facades\File; @endphp
    @if(session()->has('member_id'))
        <div class="row mb-4">
            
            <div class="col-md-6 mx-auto">
                <input
                    type="text"
                    id="memberSearch"
                    class="form-control"
                    placeholder="Search by name, email, phone, Bihar, UK..."
                >
            </div>
        </div>

      
        
        <div class="row">
            @foreach($members as $m)

            @php
                $initials = '';
                $parts = explode(' ', $m->name);
                if (count($parts) >= 2) {
                    $initials = strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1));
                } else {
                    $initials = strtoupper(substr($m->name, 0, 1));
                }
                $imagePath = public_path('members/' . $m->image);
                $hasImage  = $m->image && File::exists($imagePath);
            @endphp

            <div
                class="col-md-3 col-sm-6 mb-4 member-item"
                data-name="{{ strtolower($m->name) }}"
                data-email="{{ strtolower($m->email) }}"
                data-phone="{{ strtolower($m->phone) }}"
                data-bihar="{{ strtolower($m->bihar_location) }}"
                data-uk="{{ strtolower($m->uk_location) }}"
            >
                <div class="member-card text-center">

                    @if($hasImage)
                        <img src="{{ asset('members/' . $m->image) }}" class="member-img mb-3" alt="{{ $m->name }}">
                    @else
                        <div class="auto-avatar mb-3">{{ $initials }}</div>
                    @endif

                    <h5>{{ $m->name }}</h5>
                    <p class="text-muted small mb-0">
                        Bihar: {{ $m->bihar_location ?? '-' }}<br>
                        UK: {{ $m->uk_location ?? '-' }}
                    </p>

                </div>
            </div>

            @endforeach
        </div>
    @endif
</div><!-- /.container -->


<!-- Back to top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Preloader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>


@include('layouts.footer')


<!-- ══════════════════════════════════
     SCRIPTS
══════════════════════════════════ -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script>

    /* ──────────────────────────────────
       Helpers
    ────────────────────────────────── */
    function getEl(id)  { return document.getElementById(id); }
    function setHint(hintId, msg, type) {
        var el = getEl(hintId);
        if (!el) return;
        el.textContent  = msg;
        el.className    = 'field-hint' + (type ? ' ' + type : '');
    }
    function setFieldState(fieldId, valid) {
        var el = getEl(fieldId);
        if (!el) return;
        el.classList.remove('is-invalid-custom', 'is-valid-custom');
        if (valid === true)  el.classList.add('is-valid-custom');
        if (valid === false) el.classList.add('is-invalid-custom');
    }
    function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }
    function isValidPhone(v) { return /^[\d\s\+\-\(\)]{7,}$/.test(v.trim()); }


    /* ──────────────────────────────────
       Image Preview
    ────────────────────────────────── */
    getEl('image').addEventListener('change', function () {
        var file = this.files[0];
        var wrap = getEl('previewWrap');
        var img  = getEl('previewImg');
        var name = getEl('previewName');

        if (file) {
            var url   = URL.createObjectURL(file);
            img.src   = url;
            img.style.display = 'block';
            name.textContent  = file.name;
            wrap.style.display = 'flex';
        } else {
            img.style.display  = 'none';
            wrap.style.display = 'none';
        }
    });


    /* ──────────────────────────────────
       Password Match Validation (live)
    ────────────────────────────────── */
    function validatePasswords() {
        var pw  = getEl('password').value;
        var cpw = getEl('confirm_password').value;
        var ok  = true;

        /* Length check */
        if (pw.length > 0 && pw.length < 8) {
            setFieldState('password', false);
            setHint('password-hint', 'Must be at least 8 characters.', 'err');
            ok = false;
        } else if (pw.length >= 8) {
            setFieldState('password', true);
            setHint('password-hint', '');
        }

        /* Match check */
        if (cpw.length > 0) {
            if (pw !== cpw) {
                setFieldState('confirm_password', false);
                setHint('confirm-hint', 'Passwords do not match.', 'err');
                ok = false;
            } else {
                setFieldState('confirm_password', true);
                setHint('confirm-hint', 'Passwords match.', 'suc');
            }
        } else {
            setFieldState('confirm_password', null);
            setHint('confirm-hint', '');
        }

        return ok;
    }

    getEl('password').addEventListener('input', validatePasswords);
    getEl('confirm_password').addEventListener('input', validatePasswords);


    /* ──────────────────────────────────
       Inline blur validation
    ────────────────────────────────── */
    var requiredFields = ['name', 'email', 'phone', 'postcode'];

    requiredFields.forEach(function (id) {
        getEl(id).addEventListener('blur', function () {
            var v = this.value.trim();

            if (!v) {
                setFieldState(id, false);
                setHint(id + '-hint', 'This field is required.', 'err');
                return;
            }
            if (id === 'email' && !isValidEmail(v)) {
                setFieldState(id, false);
                setHint(id + '-hint', 'Enter a valid email address.', 'err');
                return;
            }
            if (id === 'phone' && !isValidPhone(v)) {
                setFieldState(id, false);
                setHint(id + '-hint', 'Enter a valid phone number.', 'err');
                return;
            }

            setFieldState(id, true);
            setHint(id + '-hint', '');
        });
    });


    /* ──────────────────────────────────
       Form Submit Validation
    ────────────────────────────────── */
    getEl('memberForm').addEventListener('submit', function (e) {
        var valid = true;

        /* Check required text fields */
        requiredFields.forEach(function (id) {
            var v = getEl(id).value.trim();
            if (!v) {
                setFieldState(id, false);
                setHint(id + '-hint', 'This field is required.', 'err');
                valid = false;
            } else if (id === 'email' && !isValidEmail(v)) {
                setFieldState(id, false);
                setHint(id + '-hint', 'Enter a valid email address.', 'err');
                valid = false;
            } else if (id === 'phone' && !isValidPhone(v)) {
                setFieldState(id, false);
                setHint(id + '-hint', 'Enter a valid phone number.', 'err');
                valid = false;
            }
        });

        /* Check password fields */
        var pw  = getEl('password').value;
        var cpw = getEl('confirm_password').value;

        if (!pw) {
            setFieldState('password', false);
            setHint('password-hint', 'This field is required.', 'err');
            valid = false;
        } else if (pw.length < 8) {
            setFieldState('password', false);
            setHint('password-hint', 'Must be at least 8 characters.', 'err');
            valid = false;
        }

        if (!cpw) {
            setFieldState('confirm_password', false);
            setHint('confirm-hint', 'This field is required.', 'err');
            valid = false;
        } else if (pw !== cpw) {
            setFieldState('confirm_password', false);
            setHint('confirm-hint', 'Passwords do not match.', 'err');
            valid = false;
        }

        if (!valid) {
            e.preventDefault();   /* Stop Laravel form submission */

            /* Scroll to first error */
            var firstErr = document.querySelector('.is-invalid-custom');
            if (firstErr) {
                firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstErr.focus();
            }
        }
    });


    /* ──────────────────────────────────
       Member Search
    ────────────────────────────────── */
    getEl('memberSearch').addEventListener('keyup', function () {
        var value   = this.value.toLowerCase();
        var members = document.querySelectorAll('.member-item');

        members.forEach(function (member) {
            var match =
                member.dataset.name.includes(value)  ||
                member.dataset.email.includes(value) ||
                member.dataset.phone.includes(value) ||
                member.dataset.bihar.includes(value) ||
                member.dataset.uk.includes(value);

            member.style.display = match ? 'block' : 'none';
        });
    });

</script>
