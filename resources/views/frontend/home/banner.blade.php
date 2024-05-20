@php
    $banner = App\Models\Banner::find(1);
@endphp

<section class="banner-section" style="background-image: url({{asset($banner->image)}});">
    <div class="auto-container">
        <div class="inner-container">
            <div class="content-box centred">
                <h2>{{$banner->title}}</h2>
                <p>{{$banner->subtitle}}</p>
            </div>
        </div>
    </div>
</section>