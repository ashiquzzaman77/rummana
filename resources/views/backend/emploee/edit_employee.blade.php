@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Employee</h5>

                <hr />

                <form action="{{ route('update.employee') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{$employee->id}}">
                    <input type="hidden" name="old_image" value="{{$employee->image}}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" value="{{$employee->name}}" name="name" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Email</label>
                                        <input type="text" value="{{$employee->email}}" name="email" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Phone</label>
                                        <input type="text" value="{{$employee->phone}}" name="phone" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Dept</label>
                                        <select class="form-select mb-3" name="position" aria-label="Default select example">

                                            <option selected disabled>Select Dept</option>

                                            <option {{$employee->position == 'advisory' ? 'selected' : ''}} value="advisory">Advisory</option>

                                            <option {{$employee->position == 'founder' ? 'selected' : ''}} value="founder">Founder</option>

                                            <option {{$employee->position == 'phwc' ? 'selected' : ''}} value="phwc">Phwc</option>

                                            <option {{$employee->position == 'reasearch' ? 'selected' : ''}} value="reasearch">Reasearch</option>

                                            <option {{$employee->position == 'public' ? 'selected' : ''}} value="reasearch">Public & Relation</option>

                                            <option {{$employee->position == 'media' ? 'selected' : ''}} value="media">Media</option>

                                            <option {{$employee->position == 'human' ? 'selected' : ''}} value="human">Human & Research</option>

                                            <option {{$employee->position == 'management' ? 'selected' : ''}} value="management">Management</option>

                                        </select>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Address</label>
                                        <input type="text" value="{{$employee->address}}" name="address" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">City</label>
                                        <input type="text" value="{{$employee->city}}" name="city" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Experience</label>
                                        <input type="text" value="{{$employee->experience}}" name="experience" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Salary</label>
                                        <input type="text" value="{{$employee->salary}}" name="salary" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">Image</label>

                                        <input type="file" autocomplete="off" id="image" name="image"
                                            class="form-control mb-2 @error('image') is-invalid @enderror">

                                        @error('image')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror

                                        <br>

                                        <img src="{{ asset($employee->image) }}" alt="banner" class="rounded-0"
                                            id="showImage" width="110">
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Employee</button>
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
                        required: 'Please Enter Employee Name',
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
