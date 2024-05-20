@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Permission Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.permission') }}" class="btn btn-secondary px-3">Add Permission</a>

                    &nbsp;&nbsp;

                    <a href="{{ route('export') }}" class="btn btn-info px-3">Export</a>

                    &nbsp;&nbsp;

                    <a href="{{ route('import') }}" class="btn btn-warning px-3">Import</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Permission <span class="badge bg-danger">{{ count($permission) }}</span>
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
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($permission as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{$item->name}}</td>

                                    <td>{{$item->group_name}}</td>

                                    <td>

                                        <a href="{{ route('edit.permission', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fadeIn animated bx bx-edit"></i></a>

                                        <a href="{{ route('delete.permission', $item->id) }}" class="btn btn-danger btn-sm"
                                            title="Delete" id="delete"><i class="fadeIn animated bx bx-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
