@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Add Team</h5>

                <hr />

                <form action="{{ route('store.team') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" autocomplete="off" name="name" class="form-control"
                                            placeholder="Enter Name">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Position</label>
                                        <input type="text" autocomplete="off" name="position" class="form-control"
                                            placeholder="Enter Position">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Decription</label>
                                        <textarea id="mytextarea" class="form-control" name="description"></textarea>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Status</label>
                                        <input type="text" autocomplete="off" name="status" class="form-control "
                                            placeholder="Enter Status">

                                    </div>

                                    <div class="mb-3 form-group">

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
                        required: 'Please Enter Team Member Name',
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
