@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">

                        @php
                            $employee = App\Models\Employee::latest()->get();
                        @endphp

                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ count($employee) }} Person</h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Employee</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">

                    @php
                        $msg = App\Models\ProjectMsg::latest()->get();
                    @endphp

                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{count($msg)}}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Messages</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    @php
                        $subscribe = App\Models\Subscribe::latest()->get();
                    @endphp
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{count($subscribe)}}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope-open fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Subscribe</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    @php
                        $project = App\Models\Project::latest()->get();
                    @endphp
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{count($project)}}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dice-3 fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Project</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!--end row-->

        

    </div>
@endsection
