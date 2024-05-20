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

    <title>405 Error</title>

</head>

<body>

    <!-- wrapper -->
    <div class="wrapper">

        <div class="error-404 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-xl-5">
                            <div class="card-body p-4">
                                <h1 class="display-1"><span class="text-warning">4</span><span
                                        class="text-danger">0</span><span class="text-primary">3</span></h1>
                                <h2 class="font-weight-bold display-4">Sorry, unexpected error</h2>
                                <p>User not access this page
                                </p>
                                <div class="mt-5"> <a href="{{route('admin.dashboard')}}"
                                        class="btn btn-lg btn-primary px-md-5 radius-30">Go Home</a>
                                    <a href="javascript:;"
                                        class="btn btn-lg btn-outline-dark ms-3 px-md-5 radius-30">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <img src="{{asset('backend/assets/images/errors-images/3819677.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>

    </div>
    <!-- end wrapper -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
