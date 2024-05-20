@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Admin</h5>

                <hr />

                <form action="{{ route('update.admin',$user->id) }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" value="{{ $user->name }}" name="name"
                                            class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Email</label>
                                        <input type="text" value="{{ $user->email }}" name="email"
                                            class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Phone</label>
                                        <input type="text" value="{{ $user->phone }}" name="phone"
                                            class="form-control" autocomplete="off">

                                    </div>

                                    {{-- <div class="mb-3">

                                        <label class="form-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" autocomplete="off">

                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div> --}}

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Role</label>

                                        <select class="form-select" name="roles">
                                            <option selected disabled>Select Role Name</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ $user->hasrole($role->name) ? 'selected' : '' }}>

                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Admin</button>
                                    </div>


                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

    </div>

    {{-- Image --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
