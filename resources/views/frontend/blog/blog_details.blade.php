@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Blog Details
@endsection

    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{asset('frontend/assets/images/background/page-title-5.jpg')}});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h2 class="text-white">{{$blog->blog_name}}</h2>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{asset($blog->image)}}" alt="" style="width: 770px; height: 520px;"></figure>
                                </div>
                                <div class="lower-content">
                                    <h3>{{$blog->blog_name}}</h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img
                                                    src="{{ url('upload/no_image.jpg') }}"
                                                    alt=""></figure>
                                            <h5><a href="blog-details.html">Admin</a></h5>
                                        </li>
                                        <li>{{$blog->created_at->format('d M Y')}}</li>
                                    </ul>
                                    <div class="text">
                                        <p>{!!$blog->long_descp!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="comments-area">
                            <div class="group-title">
                                <h4>3 Comments</h4>
                            </div>
                            <div class="comment-box">
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-1.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Rebeka Dawson</h5>
                                            <span>April 10, 2020</span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos trud exerc.</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment replay-comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-2.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Elizabeth Winstead</h5>
                                            <span>April 10, 2020</span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, consectur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-3.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Benedict Cumbatch</h5>
                                            <span>April 10, 2020</span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos trud exerc.</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="comments-form-area">
                            <div class="group-title">
                                <h4>Leave a Comment</h4>
                            </div>
                            <form action="blog-details.html" method="post" class="comment-form default-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="Your name" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Your email" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="Phone number" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="subject" placeholder="Subject" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your message"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        
                        <div class="sidebar-widget social-widget">
                            <div class="widget-title">
                                <h4>Follow Us On</h4>
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="blog-1.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="blog-1.html"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>Recent Posts</h4>
                            </div>
                            @php
                                $blog = App\Models\Blog::latest()->limit(3)->get();
                            @endphp
                            <div class="post-inner">

                                @foreach ($blog as $item)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}"><img src="{{asset($item->image)}}" class="rounded-0" alt=""></a></figure>
                                    <h5><a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}">{{$item->blog_name}}</a></h5>
                                    <span class="post-date">{{$item->created_at->format('d M Y')}}</span>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->

    <!-- subscribe-section -->
    @include('frontend.home.subscribe')
    <!-- subscribe-section end -->
@endsection