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
                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image"
                    data-caption=""><i class="icon-17"></i></a>
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
                    <h5>Why Choose Us?</h5>
                    <h2>Reasons To Choose Us</h2>
                </div>
                <div class="btn-box">
                    <a href="categories.html" class="theme-btn btn-one">All Categories</a>
                </div>
            </div>
            <div class="lower-box">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-19"></i></div>
                                <h4>Excellent Reputation</h4>
                                <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-26"></i></div>
                                <h4>Best Local Agents</h4>
                                <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-21"></i></div>
                                <h4>Personalized Service</h4>
                                <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- chooseus-section end -->

<!-- team-section -->
@include('frontend.home.team')
<!-- team-section end -->

<!-- news-section -->
<section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>News & Article</h5>
            <h2>Stay Update With Realshed</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend/assets/') }}images/news/news-1.jpg" alt=""></a>
                            </figure>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">Including Animation In Your Design System</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('frontend/assets/') }}images/news/author-1.jpg"
                                            alt=""></figure>
                                    <h5><a href="blog-details.html">Eva Green</a></h5>
                                </li>
                                <li>April 10, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend/assets/') }}images/news/news-2.jpg"
                                        alt=""></a></figure>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">Taking The Pattern Library To The Next Level</a>
                            </h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('frontend/assets/') }}images/news/author-2.jpg"
                                            alt=""></figure>
                                    <h5><a href="blog-details.html">George Clooney</a></h5>
                                </li>
                                <li>April 09, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend/assets/') }}images/news/news-3.jpg"
                                        alt=""></a></figure>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">How New Font Technologies Will Improve The Web</a>
                            </h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('frontend/assets/') }}images/news/author-3.jpg"
                                            alt=""></figure>
                                    <h5><a href="blog-details.html">Simon Baker</a></h5>
                                </li>
                                <li>April 28, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news-section end -->

<!-- category-section -->
@include('frontend.home.partners')
<!-- category-section end -->

@endsection

