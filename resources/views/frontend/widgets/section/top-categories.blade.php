<div class="ps-top-categories">
<!-- categories-product-section -->
    <div class="categories-product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="v3_header_title_area">
                        <span class="v3_header_title">@translate(TOP CATEGORIES OF THE MONTH)</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse (categories(10, null) as $home_category)
                @if ($home_category->top == 1)
                <div class="col-lg-4 col-md-6 col-12 wow fadeInUp">
                    <a href="">
                        <div class="v3-single-cat" style="background-image: url({{ filePath($home_category->image) }});">
                            <span class="v3-cat-title h4"><i class="far fa-gem"></i> {{ trans('categories.'. $home_category->name) }}</span>
                        </div>
                    </a>
                </div>
                @endif
                @empty
                <img src="{{ asset('no-category-found.jpg') }}" class="img-fluid" alt="#no-category-found">
                 @endforelse
                
            </div>
        </div>
    </div>










</div>
