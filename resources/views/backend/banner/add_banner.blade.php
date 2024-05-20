@extends('admin.admin_dashboard')
@section('admin')

{{-- Validation --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Add Banner</h5>

                <hr />

                <form action="{{route('store.banner')}}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-body mt-4" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Banner Title</label>
                                        <input type="text" autocomplete="off" name="title" class="form-control" 
                                            placeholder="Enter Banner Title">
    
                                    </div>
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Sub Title</label>
                                        <input type="text" autocomplete="off" name="subtitle" class="form-control" 
                                            placeholder="Enter Sub Title">
    
                                    </div>
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Image</label>
    
                                        <input type="file" autocomplete="off" id="image" name="image" class="form-control mb-2">
    
                                        <img src="{{ url('upload/no_image.jpg') }}"
                                                    alt="banner" class="rounded-0" id="showImage" width="110">
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
                    title: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: 'Please Enter Banner Title',
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
