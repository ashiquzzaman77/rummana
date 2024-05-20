@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Add Blog</h5>

                <hr />

                <form action="{{ route('store.blog') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" name="blog_name" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Short Descp</label>
                                        <textarea name="short_descp" class="form-control" rows="3"></textarea>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Long Descp</label>
                                        <textarea id="mytextarea" class="form-control" name="long_descp"></textarea>

                                    </div>

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="mb-3">

                                                <label class="form-label">Image</label>

                                                <input type="file" autocomplete="off" id="image" name="image"
                                                    class="form-control mb-2 @error('image') is-invalid @enderror">

                                                @error('image')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror

                                                <br>

                                                <img src="{{ url('upload/no_image.jpg') }}" alt="project" class="rounded-0"
                                                    id="showImage" width="70" height="70">
                                            </div>
                                        </div>

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
                blog_name: {
                    description: {
                        required: true,
                    },
                },
                messages: {
                    blog_name: {
                        required: 'Enter Blog Name',
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
