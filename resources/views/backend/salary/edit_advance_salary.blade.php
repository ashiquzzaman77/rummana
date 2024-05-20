@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Advance Salary</h5>

                <hr />

                <form action="{{ route('update.advance.salary') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $advance->id }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>

                                        <select class="form-select mb-3" name="employee_id"
                                            aria-label="Default select example">

                                            <option selected disabled>Select Employee Name</option>

                                            @foreach ($employee as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $advance->employee_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Month</label>
                                        <select class="form-select mb-3" name="month" aria-label="Default select example">

                                            <option selected disabled>Select Month </option>

                                            <option {{ $advance->month == 'January' ? 'selected' : '' }} value="January">
                                                January</option>

                                            <option {{ $advance->month == 'February' ? 'selected' : '' }} value="February">
                                                February</option>

                                            <option {{ $advance->month == 'March' ? 'selected' : '' }} value="March">March
                                            </option>

                                            <option {{ $advance->month == 'April' ? 'selected' : '' }} value="April">April
                                            </option>

                                            <option {{ $advance->month == 'May' ? 'selected' : '' }} value="May">May
                                            </option>

                                            <option {{ $advance->month == 'June' ? 'selected' : '' }} value="June">June
                                            </option>

                                            <option {{ $advance->month == 'July' ? 'selected' : '' }} value="July">July
                                            </option>

                                            <option {{ $advance->month == 'August' ? 'selected' : '' }} value="August">
                                                August</option>

                                            <option {{ $advance->month == 'September' ? 'selected' : '' }}
                                                value="September">September</option>

                                            <option {{ $advance->month == 'October' ? 'selected' : '' }} value="October">
                                                October</option>

                                            <option {{ $advance->month == 'November' ? 'selected' : '' }} value="November">
                                                November</option>

                                            <option {{ $advance->month == 'December' ? 'selected' : '' }} value="December">
                                                December</option>

                                        </select>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Year</label>
                                        <input type="text" value="{{ $advance->year }}" name="year"
                                            class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Advance Salary</label>
                                        <input type="text" value="{{ $advance->advance_salary }}" name="advance_salary"
                                            class="form-control" autocomplete="off">

                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Advance Salary</button>
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
                    employee_id: {
                        required: true,
                    },
                },
                messages: {
                    employee_id: {
                        required: 'Please Enter Employee Name',
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
