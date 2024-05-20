@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Home | Project Details
@endsection

<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{$project->project_name}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Property Details</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- gallery-style-one -->
<section class="gallery-style-two mt-5 centred">
    <div class="auto-container">
        <div class="sortable-masonry">
            <div class="items-container row clearfix">

                @foreach ($gallery as $img)
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all real_estate architechture">
                        <div class="gallery-block-one">
                            <div class="inner-box">
                                <div class="image-box">

                                    <figure class="image"><img src="{{ asset($img->photo) }}" alt="">
                                    </figure>

                                    <a href="{{ asset($img->photo) }}" class="lightbox-image" data-fancybox="gallery"><i
                                            class="icon-31"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- gallery-style-one end -->

<!-- property-details -->
<section class="property-details property-details-one">
    <div class="auto-container">
        <div class="row clearfix">

            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-details-content">

                    <div class="discription-box content-widget">
                        <div class="title-box">
                            <h4>Project Description</h4>
                        </div>
                        <div class="text">
                            <p>{!! $project->long_descp !!}</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- @php
                $id = Auth::user()->id;
                $data = App\Models\User::find($id);
            @endphp --}}

            {{-- <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="property-sidebar default-sidebar">
                    <div class="author-widget sidebar-widget">

                        <div class="text-start pb-3">
                            <h4>Project By Message</h4>
                        </div>

                        <div class="form-inner">

                            <form action="{{route('store.project.message')}}" method="post" class="default-form">

                                @csrf

                                <input type="hidden" name="project_id" value="{{$project->id}}">

                                <div class="form-group">
                                    <input type="text" value="{{$data->name}}" autocomplete="off" name="name" placeholder="Your name" required="">
                                </div>

                                <div class="form-group">
                                    <input type="email" value="{{$data->email}}" autocomplete="off" name="email" placeholder="Your Email" required="">
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{$data->phone}}" autocomplete="off" name="phone" placeholder="Phone" required="">
                                </div>

                                <div class="form-group">
                                    <input type="text"  autocomplete="off" name="subject" placeholder="Subject" required="">
                                </div>

                                <div class="form-group">
                                    <textarea name="message" placeholder="Message">{{$data->message}}</textarea>
                                </div>

                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Send Message</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
<!-- property-details end -->

<!-- subscribe-section -->
@include('frontend.home.subscribe')
<!-- subscribe-section end -->

@endsection
