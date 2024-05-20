@php
    $about = App\Models\about::find(1);
@endphp

<section class="about-section about-page pb-0">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row justify-content-center clearfix">

                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_2">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset($about->image) }}"
                                    alt=""></figure>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <h5>About</h5>
                                <h3>We Are In A Mission To Help The Helpless</h2>
                            </div>
                            <div class="text mb-3">
                                <p>{!!$about->description!!}</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{route('contact')}}" class="theme-btn btn-one">Contact With Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>