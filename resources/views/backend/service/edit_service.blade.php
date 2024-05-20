@extends('admin.admin_dashboard')
@section('admin')

{{-- Validation --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Service</h5>

                <hr />

                <form action="{{route('update.service')}}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{$service->id}}">

                    <div class="form-body mt-4" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Service Title</label>
                                        <input type="text" autocomplete="off" name="title" class="form-control" value="{{$service->title}}" 
                                            placeholder="Enter Service Title">
    
                                    </div>
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Sub Title</label>

                                        <textarea name="subtitle" class="form-control" cols="5" rows="5">{{$service->subtitle}}</textarea>
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Icon</label>
                                        <input type="text" value="{{$service->icon}}"   autocomplete="off" name="icon" class="form-control" 
                                            placeholder="Enter Sub Title">
    
                                    </div>
    
                                    
    
                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Service</button>
                                    </div>
    
                                   
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

    </div>

    

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
                        required: 'Please Enter Service Title',
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
