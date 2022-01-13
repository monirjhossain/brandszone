<!-- hero part -->
<div class="v3-hero-area mt-5 desktop-view">
    <div class="container">
        <div class="row">
            
            @include('frontend.include.sidebar.desktop.category-sidebar')

            <div class="col-lg-9 col-md-12">
                <div class="v3_hero_banner_slider wow fadeInUp">
                    @if (getPromotions('mainSlider')->count() != 1)

                    @foreach(getPromotions('mainSlider') as $main_slider)
                        <div class="v3_hero_banner">
                            <a href="{{ $main_slider->link }}">
                                <img src="{{ filePath($main_slider->image) }}" max-height="410" height="410" class="rounded" alt="">
                            </a>
                        </div>
                    @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mobile-view mt-3">
        <div class="v3_hero_banner_slider">
            @if (getPromotions('mainSlider')->count() != 1)
                @foreach(getPromotions('mainSlider') as $main_slider)
                    <div class="v3_hero_banner">
                        <img src="{{ filePath($main_slider->image) }}" alt="">
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>

@includeWhen(true, 'frontend.mobile_widgets.category')

