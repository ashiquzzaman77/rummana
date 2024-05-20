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
    <title>Admin | Forgot Password</title>

    {{-- Toaster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="bg-forgot">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box">
                <div class="card-body">
                    <div class="p-4 rounded  border">
                        <div class="text-center">
                            <img src="{{ asset('backend/assets/images/icons/forgot-2.png') }}" width="120"
                                alt="" />
                        </div>

                        <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>

                        <p class="text-muted">Enter your registered email ID to reset the password</p>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div>

                                <label for="email" class="form-label">Email</label>

                                <input id="email" type="email" name="email" autocomplete="off" placeholder="Enter Email Address"
                                    class="mb-0 form-control form-control-lg @error('email') is-invalid @enderror"
                                    required autofocus />

                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <!-- Session Status -->
                            <div class="text-success text-bold">
                                <x-auth-session-status class="mb-2" :status="session('status')" />
                            </div>

                            <div class="d-grid gap-2 mt-3">

                                <button type="submit" class="btn btn-primary btn-lg">Send</button>

                                <a href="{{ route('login') }}" class="btn btn-light btn-lg"><i
                                        class='bx bx-arrow-back me-1'></i>Back to Login</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->

    {{-- Toaster --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
