@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">SiteSetting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">SiteSetting Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.sitesetting') }}" class="btn btn-secondary px-3">Add SiteSetting</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total SiteSetting <span class="badge bg-danger">{{ count($site) }}</span></h6>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Time</th>
                                <th>Facebook</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($site as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->facebook }}</td>

                                    <td>
                                        @if (Auth::user()->can('edit.sitesetting'))
                                            <a href="{{ route('edit.sitesetting', $item->id) }}"
                                                class="btn btn-success btn-sm" title="Edit"><i
                                                    class="fadeIn animated bx bx-comment-edit"></i></a>
                                        @endif


                                        {{-- <a href="{{route('delete.banner',$item->id)}}" class="btn btn-danger btn-sm" title="Delete" id="delete"><i class="fadeIn animated bx bx-trash"></i></a> --}}

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Time</th>
                                <th>Facebook</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
