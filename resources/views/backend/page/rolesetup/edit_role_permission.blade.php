@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Role Permission</h5>

                <hr />

                <form action="{{ route('admin.update.role',$role->id) }}" id="myForm" method="POST">

                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Role Name</label>
                                        <h4 class="text-danger">{{ $role->name }}</h4>

                                    </div>

                                    <div class="form-check mb-3">

                                        <input class="form-check-input" type="checkbox" value=""
                                            id="checkDefaultmain">

                                        <label class="form-check-label" for="checkDefaultmain">All Permission</label>

                                    </div>

                                    <hr>

                                    {{-- //////////////////////// --}}

                                    @foreach ($permission_groups as $group)
                                        <div class="row">

                                            <div class="col-4">

                                                @php
                                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                @endphp

                                                <div class="form-check mb-2">

                                                    <input class="form-check-input" type="checkbox"
                                                        {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}
                                                        value="" id="flexCheckDefault">

                                                    <label class="form-check-label text-capitalize"
                                                        for="flexCheckDefault">{{ $group->group_name }}</label>

                                                </div>
                                            </div>

                                            <div class="col-8">

                                                @foreach ($permissions as $permission)
                                                    <div class="form-check mb-2">

                                                        <input class="form-check-input" type="checkbox" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} name="permission[]"
                                                            value="{{ $permission->id }}"
                                                            id="flexCheckDefault{{ $permission->id }}">

                                                        <label class="form-check-label"
                                                            for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>

                                                    </div>
                                                @endforeach
                                                <br>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Add Role Permission</button>
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
                    role_id: {
                        required: true,
                    },
                },
                messages: {
                    role_id: {
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

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {

            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }

        });
    </script>
@endsection
