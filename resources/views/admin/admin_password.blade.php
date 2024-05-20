@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-lg-block mb-3">
            <div class="breadcrumb-title pe-3">
                <h4>Admin Password</h4>
            </div>
        </div>
        <!--end breadcrumb-->

        @php
            $id = Auth::user()->id;
            $profileData = App\Models\User::find($id);
        @endphp

        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                    <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                        alt="Admin" class="rounded-circle" width="110">

                                    <div class="mt-2">
                                        <h4>{{ $profileData->name }}</h4>
                                        <p class="text-secondary mb-1"></p>
                                        <p class="text-muted font-size-sm">{{ $profileData->email }}</p>
                                    </div>
                                </div>

                                <hr class="my-4" />

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Name:</h6>
                                        <span class="text-secondary">{{ $profileData->name }}</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">User Name:</h6>
                                        <span class="text-secondary">{{ $profileData->username }}</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Email:</h6>
                                        <span class="text-secondary">{{ $profileData->email }}</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Phone:</h6>
                                        <span class="text-secondary">{{ $profileData->phone }}</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Address:</h6>
                                        <span class="text-secondary">{{ $profileData->address }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('admin.password.update') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Old Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" autocomplete="off" class="form-control @error('old_password') is-invalid @enderror"
                                                name="old_password" />

                                            @error('old_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" autocomplete="off" class="form-control @error('new_password') is-invalid @enderror"
                                                name="new_password" />

                                            @error('new_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" autocomplete="off" class="form-control"
                                                name="new_password_confirmation" />
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update Password" />
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
