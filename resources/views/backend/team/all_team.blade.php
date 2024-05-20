@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Team</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Team Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.team') }}" class="btn btn-secondary px-3">Add Team</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Team <span class="badge bg-danger">{{ count($team) }}</span></h6>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($team as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" style="width:60px;height: 60px;"
                                            alt="">
                                    </td>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->status }}</td>

                                    <td>
                                        @if (Auth::user()->can('edit.team'))
                                            <a href="{{ route('edit.team', $item->id) }}" class="btn btn-success btn-sm"
                                                title="Edit"><i class="fadeIn animated bx bx-comment-edit"></i></a>
                                        @endif

                                        @if (Auth::user()->can('delete.team'))
                                            <a href="{{ route('delete.team', $item->id) }}" class="btn btn-danger btn-sm"
                                                title="Delete" id="delete"><i
                                                    class="fadeIn animated bx bx-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
