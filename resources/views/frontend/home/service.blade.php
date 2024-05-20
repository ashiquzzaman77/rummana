@php
    $service = App\Models\Service::latest()->get();
@endphp

<section class="feature-style-three centred pb-110">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Services</h5>
            <h2>Our Services</h2>
        </div>
        <div class="three-item-carousel h-100 owl-carousel owl-theme owl-nav-none dots-style-one">

            @foreach ($service as $item)
                <div class="feature-block-two">
                    <div class="inner-box">
                        <div class="icon-box"><i class="{{ $item->icon }}"></i></div>
                        <h5 class="pb-2">{{ $item->title }}</h5>
                        <p>{{ $item->subtitle }}.</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
