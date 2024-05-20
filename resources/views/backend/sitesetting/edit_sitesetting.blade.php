@extends('admin.admin_dashboard')
@section('admin')

{{-- Validation --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit SiteSetting</h5>

                <hr />

                <form action="{{route('update.sitesetting')}}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{$site->id}}">

                    <div class="form-body mt-4" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Email</label>
                                        <input type="text" value="{{$site->email}}" autocomplete="off" name="email" class="form-control" 
                                            placeholder="Enter Email">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Address</label>
                                        <input type="text" value="{{$site->address}}" autocomplete="off" name="address" class="form-control" 
                                            placeholder="Enter Address">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Phone</label>
                                        <input type="text" value="{{$site->phone}}" autocomplete="off" name="phone" class="form-control" 
                                            placeholder="Enter Phone Number">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Time</label>
                                        <input type="text" value="{{$site->time}}" autocomplete="off" name="time" class="form-control" 
                                            placeholder="Enter Open & Close Time">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Map</label>
                                        <textarea name="map" class="form-control" rows="3">{{$site->map}}</textarea>
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Facebook</label>
                                        <input type="text" autocomplete="off" name="facebook" value="{{$site->facebook}}" class="form-control" 
                                            placeholder="Enter Facebook">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Linkdin</label>
                                        <input type="text" value="{{$site->linkdin}}" autocomplete="off" name="linkdin" class="form-control" 
                                            placeholder="Enter Linkdin">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Twitter</label>
                                        <input type="text" value="{{$site->twitter}}" autocomplete="off" name="twitter" class="form-control" 
                                            placeholder="Enter Twitter">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Instagrm</label>
                                        <input type="text" autocomplete="off" name="instagrm" value="{{$site->instagrm}}" class="form-control" 
                                            placeholder="Enter Instagrm">
    
                                    </div>

                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Youtube</label>
                                        <input type="text" value="{{$site->youtube}}" autocomplete="off" name="youtube" class="form-control" 
                                            placeholder="Enter Youtube">
    
                                    </div>
    
                                    
    
                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update SiteSetting</button>
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
                    email: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: 'Please Enter Email Address',
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
