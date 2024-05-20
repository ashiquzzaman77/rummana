@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Team
@endsection

<!--Page Title-->
<section class="page-title centred" style="background-image: url({{asset('frontend/assets/images/background/video-1.jpg')}});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Team Member</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Team</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- Team Member -->

{{-- Advisory Body --}}

<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Team</h5>
            <h2>Advisory Body</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'advisory')
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('team.details', $item->id) }}"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Founder & CEO --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>Founder & CEO</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'founder')
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('team.details', $item->id) }}"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Project Management --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>Project Management</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'management')
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Human Resources (HR) --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>Human Resources (HR)</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'human')
                ->orderBy('id', 'ASC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Media Section --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>Media Section</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'media')
                ->orderBy('id', 'ASC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Reasearch & Development --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>Reasearch & Development</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'reasearch')
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- Public Relation --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>Public Relation</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'public')
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- phwc --}}
<section class="team-section sec-pad-team centred">
    <div class="auto-container">
        <div class="sec-title">
            {{-- <h5>Our Team</h5> --}}
            <h2>PHWC</h2>
        </div>
        @php
            $team = App\Models\Team::where('status', 'phwc')
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block mx-auto">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset($item->image) }}"
                                        alt=""></a></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h6 class="text-dark">{{ $item->name }}</h6>
                                    <span class="designation">{{ $item->position }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Team Member -->

<!-- subscribe-section -->
@include('frontend.home.subscribe')
<!-- subscribe-section end -->

@endsection
