@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--start email wrapper-->
        <div class="email-wrapper">
            <div class="row">
                <div class="col-12">

                    <div class="email-read-box p-3">

                        <div class="d-flex align-items-center">
                            
                            <h6>Subject : {{ $msg->subject }}</h6>
                            <p class="mb-0 chat-time ps-5 ms-auto">{{ $msg->created_at }}</p>
                        </div>
                        <hr>
                        <div class="">
                            <h5>Project Name : {{ $msg['project']['project_name'] }}</h5>
                            <br>
                            <h6>Dear,</h6>
                            <h6>{{ $msg->message }}</h6>
                        </div>
                        <div class="mt-3">
                            <p class="mb-2 fw-bold">Best Regards</p>
                            <span>{{$msg->name}}</span><br>
                            <span>{{$msg->email}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end email wrapper-->
    </div>
@endsection
