@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--start email wrapper-->
        <div class="email-wrapper">
            <div class="row">
                <div class="col-12">

                    <div class="email-read-box p-3">

                        <div class="d-flex align-items-center">
                            <h4>{{ $message->subject }}</h4>
                            <p class="mb-0 chat-time ps-5 ms-auto">{{ $message->created_at }}</p>
                        </div>
                        <hr>
                        <div class="">
                            <h5>Dear,</h5>
                            <h5>{{ $message->message }}</h5>
                        </div>
                        <div class="mt-3">
                            <p class="mb-2 fw-bold">Best Regards</p>
                            <span>{{$message->name}}</span><br>
                            <span>{{$message->email}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end email wrapper-->
    </div>
@endsection
