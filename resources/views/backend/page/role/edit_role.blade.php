@extends('admin.admin_dashboard')
@section('admin')

{{-- Validation --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Role</h5>

                <hr />

                <form action="{{route('update.role')}}" id="myForm" method="POST">

                    @csrf

                    <input type="hidden" name="id" value="{{$role->id}}">

                    <div class="form-body mt-4" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Role Name</label>
                                        <input type="text" value="{{$role->name}}" autocomplete="off" name="name" class="form-control" 
                                            placeholder="Enter Permission">
    
                                    </div>
    
                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Role</button>
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
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Role Name',
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
