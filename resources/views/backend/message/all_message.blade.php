@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Message</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Message Table</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.testimonial') }}" class="btn btn-secondary px-3">Add Testimonial</a>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Message <span class="badge bg-danger">{{ count($message) }}</span>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($message as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{$item->name}}</td>

                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->subject}}</td>

                                    <td>

                                        <a href="{{ route('view.contact.message', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fadeIn animated bx bx-message"></i></a>

                                        <a href="{{ route('delete.contact.message', $item->id) }}" class="btn btn-danger btn-sm"
                                            title="Delete" id="delete"><i class="fadeIn animated bx bx-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
