@php
    $team = App\Models\Team::latest()
        ->limit(3)
        ->get();
@endphp

<section class="team-section sec-pad centred">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Team</h5>
            <h2>Meet Our Excellent Team</h2>
        </div>
        <div class="row clearfix">

            @foreach ($team as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                    <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('team.details', $item->id) }}"><img
                                        src="{{ asset($item->image) }}" alt=""></a></figure>
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
