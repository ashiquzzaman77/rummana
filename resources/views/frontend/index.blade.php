@extends('frontend.frontend_dashboard')
@section('main')

@section('title')
    Home | Rummana
@endsection

<!-- banner-section -->
@include('frontend.home.banner')
<!-- banner-section end -->

<!-- about-section -->
@include('frontend.home.about')
<!-- about-section end -->

<!-- Service Section -->
@include('frontend.home.service')
<!-- Service Section -->

<!-- Project section -->
@include('frontend.home.project')
<!-- Project section end -->

<!-- video-section -->
<section class="video-section centred"
    style="background-image: url({{ asset('frontend/assets/images/background/video-1.jpg') }});">
    <div class="auto-container">
        <div class="video-inner">
            <div class="video-btn">
                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i
                        class="icon-17"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- video-section end -->

<!-- testimonial-section end -->
@include('frontend.home.testimonial')
<!-- testimonial-section end -->

<!-- chooseus-section -->
<section class="chooseus-section">
    <div class="auto-container">
        <div class="inner-container bg-color-2">
            <div class="upper-box clearfix">
                <div class="sec-title light">
                    <h5>Service?</h5>
                    <h2>Our Services Us</h2>
                </div>
                <div class="btn-box">
                    <a href="Javascript;;" class="theme-btn btn-one">All Services</a>
                </div>
            </div>
            @php
                $services = App\Models\Service::latest()->limit(3)->get();
            @endphp
            <div class="lower-box">
                <div class="row clearfix">

                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{$service->icon}}"></i></div>
                                    <h4>{{$service->title}}</h4>
                                    <p>{{$service->subtitle}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- chooseus-section end -->

<!-- team-section -->
@include('frontend.home.team')
<!-- team-section end -->

<!-- blog-section -->
@include('frontend.home.blog')
<!-- blog-section end -->

<!-- category-section -->
@include('frontend.home.partners')
<!-- category-section end -->

@endsection
