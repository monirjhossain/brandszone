<!-- mobile category section -->
    <div class="container mobile-view mt-5">
        <div class="v3_header_title_area">
            <div class="v3_header_title">@translate(categories)</div>
        </div>
        <!-- catefory wrapper -->
        <div class="v3_mobile_cat_slider mobile-category-wrapper">

            @forelse(categories(9,null) as $gCat)
            @if($gCat->childrenCategories->count() > 0)
            <a href="{{ route('category.shop',$gCat->slug) }}" class="mobile-single-cate">
                <span class="icon-box">
                    <i class="{{ $gCat->icon }}"></i>
                </span>
                <span class="cate-title">
                    {{ Str::limit(trans('categories.' . $gCat->name), 12) }}
                </span>
            </a>
            @endif
            @empty
            @endforelse
          


        </div>
    </div>