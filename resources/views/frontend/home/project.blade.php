@php
    $project = App\Models\Project::where('status', 1)
        ->latest()
        ->limit(3)
        ->get();
@endphp

<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Project</h5>
            <h2>Featured Project</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">

            @foreach ($project as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
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
        <div class="more-btn centred"><a href="{{ route('frontend.all.project') }}" class="theme-btn btn-one">View More</a></div>
    </div>
</section>
