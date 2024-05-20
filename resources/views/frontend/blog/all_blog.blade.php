@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Blog
@endsection

<!--Page Title-->
<section class="page-title centred"
    style="background-image: url({{ asset('frontend/assets/images/background/video-1.jpg') }});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Blog</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

{{-- // Project --}}
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>Featured Blog</h2>
        </div>
        <div class="row clearfix">

            @foreach ($blog as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block py-3">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}"><img
                                        src="{{ asset($item->image) }}" style="width: 370px;height: 250px;" alt=""></a>
                            </figure>
                        </div>
                        <div class="lower-content">
                            <h4><a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}">{{$item->blog_name}}</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ url('upload/no_image.jpg') }}"
                                            alt=""></figure>
                                    <h5><a href="#">Admin</a></h5>
                                </li>
                                <li>{{$item->created_at->format('d M Y')}}</li>
                            </ul>
                            <div class="text">
                                <p>{{$item->short_descp}}</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="pagination-wrapper">

            {{$blog->links('vendor.pagination.custom_paginate')}}

        </div>
        
    </div>
</section>
{{-- // Project --}}

<!-- subscribe-section -->
@include('frontend.home.subscribe')
<!-- subscribe-section end -->

@endsection