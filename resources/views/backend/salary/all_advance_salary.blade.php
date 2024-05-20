@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Advance Salary</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Advance Salary Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.advance.salary') }}" class="btn btn-secondary px-3">Add Advance Salary</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Month Name <span class="badge bg-danger">{{ date('F Y') }}</span></h6>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Card No</th>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Salary</th>
                                <th>Advance Salary</th>
                                <th>Due Salary</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($advance as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($item['employee']['image']) }}" alt=""
                                            style="width: 70px;">
                                    </td>

                                    <td>{{ $item['employee']['id_card'] }}</td>

                                    <td>{{ $item['employee']['name'] }}</td>
                                    <td>
                                        <span class="badge bg-success">{{ $item->month }}</span>
                                    </td>
                                    <td>{{ $item['employee']['salary'] }}</td>
                                    <td>
                                        @if ($item->advance_salary == null)
                                            <span class="badge bg-dark">No Advance</span>
                                        @else
                                            <span class="badge bg-danger">{{ $item->advance_salary }}</span>
                                        @endif
                                    </td>

                                    @php
                                        $due_salary = $item['employee']['salary'] - $item->advance_salary;
                                    @endphp

                                    <td>
                                        <strong>{{ round($due_salary) }}</strong>
                                    </td>

                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Salary Paid</span>
                                        @else
                                            <span class="badge bg-warning">No Paid</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if (Auth::user()->can('edit.salary'))
                                            <a href="{{ route('edit.advance.salary', $item->id) }}"
                                                class="btn btn-success btn-sm" title="Edit"><i
                                                    class="fadeIn animated bx bx-comment-edit"></i></a>
                                        @endif

                                        @if (Auth::user()->can('delete.salary'))
                                            <a href="{{ route('pay.salary', $item->id) }}" class="btn btn-danger btn-sm"><i
                                                    class="lni lni-amazon-pay"></i></a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Card No</th>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Salary</th>
                                <th>Advance Salary</th>
                                <th>Due Salary</th>
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
