@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Team Detail
@endsection

<!--Page Title-->
<section class="page-title centred"
    style="background-image: url({{ asset('frontend/assets/images/background/video-1.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{$team->name}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>{{$team->position}}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- agent-details -->
<section class="agent-details mb-4">
    <div class="auto-container">
        <div class="agent-details-content">
            <div class="agents-block-one">
                <div class="inner-box mr-0">
                    <figure class="image-box"><img src="{{ asset($team->image) }}" alt=""
                            style="width: 270px;height: 330px;"></figure>
                    <div class="content-box">
                        <div class="upper clearfix">
                            <div class="title-inner pull-left">
                                <h4>{{ $team->name }}</h4>
                                <span class="designation">{{ $team->position }}</span>
                            </div>
                            <ul class="social-list pull-right clearfix">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="text">
                            <p>{!! $team->description !!}</p>
                        </div>
                        {{-- <ul class="info clearfix mr-0">
                                <li><i class="fab fa fa-envelope"></i><a href="mailto:bean@realshed.com">bean@realshed.com</a></li>
                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057 1965</a></li>
                            </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- agent-details end -->


<!-- subscribe-section -->
@include('frontend.home.subscribe')
<!-- subscribe-section end -->

@endsection
