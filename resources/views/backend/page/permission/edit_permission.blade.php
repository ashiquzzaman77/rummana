@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Permission</h5>

                <hr />

                <form action="{{ route('update.permission') }}" id="myForm" method="POST">

                    @csrf

                    <input type="hidden" name="id" value="{{ $permission->id }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" value="{{ $permission->name }}" autocomplete="off"
                                            name="name" class="form-control" placeholder="Enter Permission">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Group Name</label>

                                        <select class="form-select mb-3" name="group_name"
                                            aria-label="Default select example">

                                            <option selected disabled>Select Group Name </option>

                                            <option {{ $permission->group_name == 'contactmsg' ? 'selected' : '' }}
                                                value="contactmsg">Contact Message</option>

                                            <option {{ $permission->group_name == '' ? 'selected' : 'projectmsg' }}
                                                value="projectmsg">Project Message</option>

                                            <option {{ $permission->group_name == 'subscribe' ? 'selected' : '' }}
                                                value="subscribe">Subscribe</option>

                                            <option {{ $permission->group_name == 'banner' ? 'selected' : '' }}
                                                value="banner">Banner</option>

                                            <option {{ $permission->group_name == 'about' ? 'selected' : '' }}
                                                value="about">About</option>

                                            <option {{ $permission->group_name == 'service' ? 'selected' : '' }}
                                                value="service">Service</option>

                                            <option {{ $permission->group_name == 'project' ? 'selected' : '' }}
                                                value="project">Project</option>

                                            <option {{ $permission->group_name == 'team' ? 'seleccted' : '' }}
                                                value="team">Team</option>

                                            <option {{ $permission->group_name == 'blog' ? 'selected' : '' }}
                                                value="blog">Blog</option>

                                            <option {{ $permission->group_name == 'testimonial' ? 'selected' : '' }}
                                                value="testimonial">Testimonial</option>

                                            <option {{ $permission->group_name == 'partner' ? 'selected' : '' }}
                                                value="partner">Partner</option>

                                            <option {{ $permission->group_name == 'sitesetting' ? 'selected' : '' }}
                                                value="sitesetting">SiteSetting</option>

                                            <option {{ $permission->group_name == 'employee' ? 'selected' : '' }}
                                                value="employee">Employee</option>

                                            <option {{ $permission->group_name == 'salary' ? 'selected' : '' }}
                                                value="salary">Salary</option>

                                            <option {{ $permission->group_name == 'role' ? 'selected' : '' }}
                                                value="role">Role & Permission</option>

                                            <option {{ $permission->group_name == 'admin' ? 'selected' : '' }}
                                                value="admin">Admin Manage</option>

                                        </select>

                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Permission</button>
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
