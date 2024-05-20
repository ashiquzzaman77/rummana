<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">

    <title>Rummana | Verify</title>
</head>

<body class="bg-lock-screen">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-lock-screen d-flex align-items-center justify-content-center">
            <div class="card shadow-none bg-transparent">
                <div class="card-body p-md-5 text-center">
                    <h2 class="text-white">{{ now()->totimeString() }}</h2>
                    <h5 class="text-white">{{ date('F D Y') }}</h5>
                    <div class="mb-4">
                        <img src="{{ asset('backend/assets/images/icons/user.png') }}" class="mt-5" width="120"
                            alt="" />
                    </div>

                    <h3 class="mt-2 mb-2 text-white">User Email Verification</h3>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 text-white">
                            {{ __('A new verification link has been sent to the email address') }}
                        </div>
                    @endif

                    <div class="mb-3 mt-3">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                
                            <div>

                                <button type="submit" class="btn btn-outline-success mt-3">
                                    Resend Verification Email
                                </button>

                            </div>
                        </form>
                
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <button type="submit" class="btn btn-outline-danger mt-3">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

</html>
