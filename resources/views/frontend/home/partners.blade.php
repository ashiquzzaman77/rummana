@php
    $partner = App\Models\Partner::orderBy('id', 'ASC')
        ->limit(5)
        ->get();
@endphp

<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix">

                @foreach ($partner as $item)
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{ asset($item->image) }}" class="rounded-1"
                                        style="width: 120px; height: 120px;" alt="">
                                </div>
                                <h5><a href="javascript:;">{{ $item->name }}</a></h5>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
            {{-- <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div> --}}
        </div>
    </div>
</section>
