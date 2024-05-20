@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Contact
@endsection

    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{asset('frontend/assets/images/background/contact.jpg')}});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Contact Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- contact-info-section -->
    @php
    $site = App\Models\SiteSetting::find(1);
@endphp
    <section class="contact-info-section sec-pad centred">
        <div class="auto-container">
            <div class="sec-title">
                <h5>Contact us</h5>
                <h2>Get In Touch</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-32"></i></div>
                            <h4>Email Address</h4>
                            <p><a href="mailto:info@example.com">{{$site->email}}</a><br /></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-33"></i></div>
                            <h4>Phone Number</h4>
                            <p><a href="tel:+23055873407">{{$site->phone}}</a><br /></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-34"></i></div>
                            <h4>Office Address</h4>
                            <p>{{$site->address}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- contact-section -->
    <section class="contact-section bg-color-1">
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h5>Contact</h5>
                            <h2>Contact Us</h2>
                        </div>
                        <div class="form-inner">

                            <form method="post" action="{{route('store.message')}}" id="contact-form">
                                @csrf 

                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" required name="name" placeholder="Your Name">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" required name="phone" placeholder="Phone">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="email" required name="email" placeholder="Email">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" required name="subject" placeholder="Subject">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" required placeholder="Message"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn btn-one" type="submit" name="submit-form">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                    <div class="google-map-area">
                        
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29198.69757433388!2d90.34682551759221!3d23.824387606193188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b7fe2b2f81%3A0xcbc9fe720ad66870!2sMoakhali!5e0!3m2!1sen!2sbd!4v1686186809932!5m2!1sen!2sbd" width="100%"
                        height="400" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


    <!-- subscribe-section -->
    @include('frontend.home.subscribe')
    <!-- subscribe-section end -->

@endsection