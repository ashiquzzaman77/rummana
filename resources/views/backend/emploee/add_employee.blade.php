@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Add Employee</h5>

                <hr />

                <form action="{{ route('store.employee') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Dept</label>
                                        <select class="form-select mb-3" name="position" aria-label="Default select example">

                                            <option selected disabled>Select Dept</option>

                                            <option value="advisory">Advisory</option>
                                            <option value="founder">Founder</option>
                                            <option value="phwc">Phwc</option>
                                            <option value="reasearch">Reasearch</option>
                                            <option value="public">Public & Relation</option>
                                            <option value="media">Media</option>
                                            <option value="human">Human & Research</option>
                                            <option value="management">Management</option>

                                        </select>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Experience</label>
                                        <input type="text" name="experience" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Salary</label>
                                        <input type="text" name="salary" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">Image</label>

                                        <input type="file" autocomplete="off" id="image" name="image"
                                            class="form-control mb-2 @error('image') is-invalid @enderror">

                                        @error('image')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror

                                        <br>

                                        <img src="{{ url('upload/no_image.jpg') }}" alt="banner" class="rounded-0"
                                            id="showImage" width="110">
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Save</button>
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
