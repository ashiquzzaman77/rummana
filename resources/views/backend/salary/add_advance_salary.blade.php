@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Add Advance Salary</h5>

                <hr />

                <form action="{{ route('store.advance.salary') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

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
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Month</label>
                                        <select class="form-select mb-3" name="month"
                                            aria-label="Default select example">

                                            <option selected disabled>Select Month </option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>

                                        </select>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Year</label>
                                        <input type="text" name="year" class="form-control" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Advance Salary</label>
                                        <input type="text" name="advance_salary" class="form-control" autocomplete="off">

                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Add Advance Salary</button>
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
