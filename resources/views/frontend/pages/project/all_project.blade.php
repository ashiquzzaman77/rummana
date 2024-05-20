@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Project
@endsection

<!--Page Title-->
<section class="page-title centred"
    style="background-image: url({{ asset('frontend/assets/images/background/video-1.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Project</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>Project</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

{{-- // Project --}}
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>Featured Project</h2>
        </div>
        <div class="row clearfix">

            @foreach ($project as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 py-3 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset($item->image) }}"
                                        style="width: 370px; height: 250px;" alt="">
                                </figure>
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">New</span>
                            </div>
                            <div class="lower-content">

                                <div class="title-text mt-4">
                                    <h4><a
                                            href="{{ url('project/details/' . $item->id . '/' . $item->project_slug) }}">{{ $item->project_name }}</a>
                                    </h4>
                                </div>

                                <p>{{ $item->short_descp }}</p>

                                <div class="btn-box"><a
                                        href="{{ url('project/details/' . $item->id . '/' . $item->project_slug) }}"
                                        class="theme-btn btn-two">See
                                        Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="pagination-wrapper">

            {{$project->links('vendor.pagination.custom_paginate')}}

        </div>

    </div>
</section>
{{-- // Project --}}

<!-- subscribe-section -->
@include('frontend.home.subscribe')
<!-- subscribe-section end -->

@endsection
