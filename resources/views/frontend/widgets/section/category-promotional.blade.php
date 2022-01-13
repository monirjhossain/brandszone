@foreach (categoryProducts() as $home_category)

@if ($home_category->is_popular == 1)

@php
$product_limit = 0;
@endphp

<div class="beauty-product-section">
    <div class="container desktop-view">
        <div class="row">
            <div class="col-lg-12">
                <div class="v3_header_title_area">
                    <span class="v3_header_title"><i class="{{ $home_category->icon }}"></i>
                        {{ trans('categories.' . $home_category->name) }}
                    </span>
                    <a href="{{ route('category.shop',$home_category->slug) }}" class="v3_all_link">@translate(view all)</a>
                </div>

            </div>
        </div>
        <div class="row mt-4 flex-row-reverse">
            <div class="col-lg-3 col-md-3 d-none d-md-block wow fadeInUp">
                <div class="discount-banner">

                    @foreach($home_category->promotionBanner->take(1) as $banner)
                    <a href="{{ $banner->link }}">
                        <img src="{{ filePath($banner->image) }}" alt="">
                    </a>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row padding-left-right-15">

                    @forelse($home_category->CategoryProducts as $product)
                    <input type="hidden" value="{{ $product_limit++ }}">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 no-border-col wow fadeInUp">
                        <div class="single-product">
                            <div class="upper-content">
                                @if($product->is_discount)
                                <span class="batch">sale</span>
                                @endif

                            </div>
                            <div class="img-box d-flex justify-content-center">
                                <img src="{{ filePath($product->image)}}" alt="{{ $product->name }}">
                            </div>


                            <div class="product-cont-box text-center">
                                <h5>
                                    <a href="{{route('single.product',[$product->sku,$product->slug])}}">
                                        {{\Illuminate\Support\Str::limit( trans('products.' . $product->name),20)}}
                                    </a>
                                </h5>
                                <div class="price text-center d-flex justify-content-center">
                                    @if (vendorActive())
                                    <span>
                                        {{formatPrice(brandProductPrice($product->sellers)->min())
                                                                           == formatPrice(brandProductPrice($product->sellers)->max())
                                                                           ? formatPrice(brandProductPrice($product->sellers)->min())
                                                                           : formatPrice(brandProductPrice($product->sellers)->min()).
                                                                           '-' .formatPrice(brandProductPrice($product->sellers)->max())}}
                                    </span>
                                    @else

                                    @if($product->is_discount)
                                    <span class="">
                                        {{formatPrice($product->discount_price)}}
                                    </span>
                                    <del class="">
                                        {{formatPrice($product->product_price)}}
                                    </del>
                                    @else
                                    <span class="">
                                        {{formatPrice($product->product_price)}}
                                    </span>
                                    @endif

                                    @endif

                                </div>
                            </div>
                            <div class="icons-link-wrapper">

                                @auth()
                                <a href="javascript:;" onclick="addToWishlist({{ $product->id }})">
                                    <span class="heart social_icon"><i class="fas fa-heart"></i></span>
                                </a>
                                @endauth

                                @guest()
                                <a href="javascript:;" onclick="addToWishlist({{$product->id}})"
                                    data-title="@translate(Add to wishlist)" data-toggle="tooltip"
                                    data-product_name='{{ $product->name }}' data-product_id='{{$product->id}}'
                                    data-product_sku='{{$product->sku}}' data-product_slug='{{$product->slug}}'
                                    data-product_image='{{ filePath($product->image) }}'
                                    data-app_url='{{ env('APP_URL') }}'
                                    data-product_price='{{formatPrice(brandProductPrice($product->sellers)->min())
                                                        == formatPrice(brandProductPrice($product->sellers)->max())
                                                        ? formatPrice(brandProductPrice($product->sellers)->min())
                                                        : formatPrice(brandProductPrice($product->sellers)->min()).
                                                        '-' .formatPrice(brandProductPrice($product->sellers)->max())}}'>
                                    <span class="heart social_icon"><i class="fas fa-heart"></i></span></a>
                                @endguest

                                <a href="javascript:;" onclick="addToCompare({{$product->id}})"><span
                                        class="reload social_icon"><i class="fa fa-random"></i></span></a>
                                <a href="javascript:;"
                                    onclick="forModal('{{ route('quick.view',$product->slug) }}', '@translate(Product quick view)')"><span
                                        class="preview social_icon"><i class="fa fa-eye"></i></span></a>
                            </div>

                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


{{-- Mobile View --}}
<div class="container mobile-view">
    <div class="v3_mobile-common-title-wrapper">
        <div class="common-title">{{ trans('categories.' . $home_category->name) }} </div>
        <a href="{{ route('category.shop',$home_category->slug) }}" class="linkall">@translate(see all)</a>
    </div>
    <!-- best seller wrapper -->
    <div class="v3_best-seller-wrapper">
        <div class="v3_mobile_best_slider">
            @forelse($home_category->CategoryProducts->take(10) as $product)

            <div>
                <div class="v3_single-product">
                    <div class="v3_img-box wow fadeInUp">
                        <a href="{{route('single.product',[$product->sku,$product->slug])}}">
                            <img src="{{ filePath($product->image)}}" alt="{{ $product->name }}">
                        </a>
                    </div>

                    <a href="{{route('single.product',[$product->sku,$product->slug])}}"
                        class="title">{{\Illuminate\Support\Str::limit(trans('products.' . $product->name),20)}}
                    </a>

                    <span class="price">
                        @if (vendorActive())
                        <span>
                            {{formatPrice(brandProductPrice($product->sellers)->min())
                                            == formatPrice(brandProductPrice($product->sellers)->max())
                                            ? formatPrice(brandProductPrice($product->sellers)->min())
                                            : formatPrice(brandProductPrice($product->sellers)->min()).
                                            '-' .formatPrice(brandProductPrice($product->sellers)->max())}}
                        </span>
                        @else

                        @if($product->is_discount)
                        <span class="">
                            {{formatPrice($product->discount_price)}}
                        </span>
                        <del class="">
                            {{formatPrice($product->product_price)}}
                        </del>
                        @else
                        <span class="">
                            {{formatPrice($product->product_price)}}
                        </span>
                        @endif

                        @endif
                    </span>

                    <div class="mbl-icon-box">

                        <a href="javascript:;" onclick="addToWishlist({{$product->id}})"
                            data-title="@translate(Add to wishlist)" data-toggle="tooltip"
                            data-product_name='{{ $product->name }}' data-product_id='{{$product->id}}'
                            data-product_sku='{{$product->sku}}' data-product_slug='{{$product->slug}}'
                            data-product_image='{{ filePath($product->image) }}' data-app_url='{{ env('APP_URL') }}'
                            data-product_price='{{formatPrice(brandProductPrice($product->sellers)->min())
                                                == formatPrice(brandProductPrice($product->sellers)->max())
                                                ? formatPrice(brandProductPrice($product->sellers)->min())
                                                : formatPrice(brandProductPrice($product->sellers)->min()).
                                                '-' .formatPrice(brandProductPrice($product->sellers)->max())}}'
                            class="p-2 heart social_icon"><i class="fas fa-heart"></i>
                        </a>


                        <a href="javascript:;"
                            onclick="forModal('{{ route('quick.view',$product->slug) }}', '@translate(Product quick view)')"
                            class="reload social_icon p-2"><i class="fas fa-eye"></i>
                        </a>

                        <a href="javascript:;" onclick="addToCompare({{$product->id}})"
                            class="preview social_icon p-2"><i class="fas fa-random"></i>
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- Mobile View::END --}}

@endif


@endforeach