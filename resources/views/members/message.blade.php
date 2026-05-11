<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Members</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">

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

    .gradient-btn:hover  { opacity: 0.91; }
    .gradient-btn:active { transform: scale(0.99); }
    .gradient-btn:disabled { opacity: 0.5; cursor: not-allowed; }

    /* ── Page heading ── */
    h2 { font-weight: 700; color: #3046A2; }

</style>

</head>
<body>
@include('layouts.navbar')
<div class="container" style="margin-top: 10rem;">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow border-0 rounded-lg">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-white">
                        Send Message to {{ $member->name }}
                    </h4>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('member.sendMessage', $member->id) }}"
                          method="POST">

                        @csrf

                        <div class="form-group">

                            <label>
                                Your Message
                            </label>

                            <textarea
                                name="message"
                                rows="7"
                                class="form-control"
                                placeholder="Type your message here..."
                                required></textarea>

                        </div>

                        <div class="mt-4">

                            <button type="submit"
                                    class="btn btn-success">
                                <i class="fa fa-paper-plane"></i>
                                Send
                            </button>

                            <a href="{{ url('/members') }}"
                               class="btn btn-danger">
                                <i class="fa fa-times"></i>
                                Discard
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Back to top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



<!-- ══════════════════════════════════
     SCRIPTS
══════════════════════════════════ -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')