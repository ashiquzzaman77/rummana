@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Role Permission Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.role.permission') }}" class="btn btn-secondary px-3">Add Role Permission</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Role Permission <span class="badge bg-danger">{{ count($role) }}</span>
        </h6>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Permission Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($role as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $item->name }}</td>

                                    <td>
                                        @foreach ($item->permissions as $prem)
                                            <span class="badge bg-danger">{{ $prem->name }}</span>
                                        @endforeach
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.edit.role', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fadeIn animated bx bx-edit"></i></a>

                                        <a href="{{ route('admin.delete.role', $item->id) }}" class="btn btn-danger btn-sm"
                                            title="Delete" id="delete"><i class="fadeIn animated bx bx-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Permission Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
