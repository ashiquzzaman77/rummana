@extends('admin.admin_dashboard')
@section('admin')

{{-- Validation --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Add Permission</h5>

                <hr />

                <form action="{{route('store.permission')}}" id="myForm" method="POST">

                    @csrf

                    <div class="form-body mt-4" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Name</label>
                                        <input type="text" autocomplete="off" name="name" class="form-control" 
                                            placeholder="Enter Permission">
    
                                    </div>
    
                                    <div class="mb-3 form-group">
    
                                        <label class="form-label">Group Name</label>

                                        <select class="form-select mb-3" name="group_name"
                                            aria-label="Default select example">

                                            <option selected disabled>Select Group Name </option>

                                            <option value="contactmsg">Contact Message</option>

                                            <option value="projectmsg">Project Message</option>

                                            <option value="subscribe">Subscribe</option>
                                            <option value="banner">Banner</option>
                                            <option value="about">About</option>
                                            <option value="service">Service</option>
                                            <option value="project">Project</option>
                                            <option value="team">Team</option>
                                            <option value="blog">Blog</option>
                                            <option value="testimonial">Testimonial</option>
                                            <option value="partner">Partner</option>
                                            <option value="sitesetting">SiteSetting</option>
                                            <option value="employee">Employee</option>
                                            <option value="salary">Salary</option>
                                            <option value="role">Role & Permission</option>
                                            <option value="admin">Admin Manage</option>

                                        </select>
    
                                    </div>
    
                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Add Permission</button>
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
                        required: 'Please Enter Permission Name',
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
