@extends('frontend.master')


@section('title')@translate(Category Products) @stop

@section('content')

    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{ route('homepage') }}">@translate(Home)</a></li>
                <li>@translate(Category Products)</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop mt-3">
        <div class="ps-container">
            <div class="ps-shop-banner d-none">
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
                     data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"
                     data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
                     data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach (categories(10, null) as $home_category)
                        @foreach($home_category->promotionBanner as $banner)
                            <a href="{{ $banner->link }}"><img src="{{ filePath($banner->image) }}" alt=""></a>
                        @endforeach
                    @endforeach
                </div>
            </div>
            {{--brand--}}
            <div class="ps-section__content d-none">
                <div class="ps-block--categories-tabs ps-tab-root">
                    <div class="ps-tabs">
                        <div class="ps-tabs">
                            <div class="ps-tab active">
                                <div class="ps-block__item">
                                    @forelse (brands(16) as $brand)
                                        <a href="shop-default.html">
                                            @if (empty($brand->logo))
                                                <img src="{{ asset('vendor-store.jpg') }}" class="rounded"
                                                     alt="#{{ $brand->name }}">
                                            @else
                                                <img src="{{ filePath($brand->logo) }}" class="rounded"
                                                     alt="#{{ $brand->name }}">
                                            @endif
                                        </a>
                                    @empty
                                        @translate(No Brand Found)
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--category--}}
            <div class="ps-shop-categories d-none">
                <div class="row align-content-lg-stretch">
                    @foreach (categories(10, null) as $home_category)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--category-2" data-mh="categories">
                                <div class="ps-block__thumbnail"><img src="{{ filePath($home_category->image) }}"
                                                                      alt=""></div>
                                <div class="ps-block__content">
                                    <h4>{{ $home_category->name }}</h4>
                                    <ul>
                                        @foreach($home_category->childrenCategories as $parent_Cat)
                                            @foreach($parent_Cat->childrenCategories as $sub_cat)
                                                <li>
                                                    <a href="{{ route('category.shop',$sub_cat->slug) }}">{{ $sub_cat->name }}</a>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">@translate(Categories)</h4>
                        <ul class="ps-list--categories">

                            @foreach (categories(500, null) as $home_category)
                                <li class="current-menu-item menu-item-has-children"><a
                                            href="{{ route('category.shop', $home_category->slug) }}">{{ $home_category->name }}</a><span
                                            class="sub-toggle {{ $parent_slug == $home_category->slug ? 'active' : null }}"><i
                                                class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu"
                                        style="display: {{ $parent_slug == $home_category->slug ? 'block' : null }}">
                                        @foreach($home_category->childrenCategories as $parent_Cat)
                                            @foreach($parent_Cat->childrenCategories as $sub_cat)
                                                <li class="current-menu-item "><a
                                                            href="{{ route('category.shop',$sub_cat->slug) }}">{{ $sub_cat->name }}
                                                        ({{ App\Models\Product::where('category_id', $sub_cat->id)->count() }}
                                                        )</a>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> {{$total_product}}</strong> @translate(Products found)</p>
                            <div class="ps-shopping__actions">
                                <div class="d-none">
                                    <select class="ps-select d-none" data-placeholder="Sort Items">
                                        <option>Sort by latest</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                                <div class="ps-shopping__view">
                                    <p>@translate(View)</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        @foreach($category_products as $category_product)
                                            @foreach($category_product->subCategoryProducts as $product)

                                                <div class="col-md-3 col-xl-3 t-mb-30">
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
                                                                    {{\Illuminate\Support\Str::limit($product->name,20)}}
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
                                                                <a href="javascript:;" onclick="addToWishlist({{$product->id}})">
                                                                    <span class="heart social_icon"><i class="fas fa-heart"></i></span>
                                                                </a>
                                                            @endauth

                                                            @guest()
                                                                    <a href="javascript:;" 
                                                                    onclick="addToWishlist({{$product->id}})"
                                                                    data-title="@translate(Add to wishlist)"
                                                                    data-toggle="tooltip" 
                                                                    data-product_name='{{ $product->name }}' 
                                                                    data-product_id='{{$product->id}}' 
                                                                    data-product_sku='{{$product->sku}}' 
                                                                    data-product_slug='{{$product->slug}}' 
                                                                    data-product_image='{{ filePath($product->image) }}' 
                                                                    data-app_url='{{ env('APP_URL') }}' 
                                                                    data-product_price='{{formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                    == formatPrice(brandProductPrice($product->sellers)->max())
                                                                                                    ? formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                    : formatPrice(brandProductPrice($product->sellers)->min()).
                                                                                                    '-' .formatPrice(brandProductPrice($product->sellers)->max())}}'><span class="heart social_icon"><i class="fas fa-heart"></i></span></a>
                                                            @endguest

                                                            <a href="javascript:;" onclick="addToCompare({{$product->id}})"><span class="reload social_icon"><i class="fa fa-random"></i></span></a>
                                                            <a href="javascript:;" onclick="forModal('{{ route('quick.view',$product->slug) }}', '@translate(Product quick view)')"><span class="preview social_icon" ><i class="fa fa-eye"></i></span></a>
                                                        </div>

                            </div>
                                                </div>

                                            @endforeach

                                            @foreach($category_product->frontCategoryProducts as $cat_product)
                                                @foreach($cat_product->CategoryProducts as $product_two)
                                                    <input type="hidden" value="{{$total_product++}}">

                                                    <div class="col-md-3 col-xl-3 t-mb-30 wow fadeInUp">
                                                        <div class="single-product">
                                <div class="upper-content">

                                    @if($product_two->is_discount)
                                        <span class="batch">sale</span>
                                    @endif

                                </div>
                                <div class="img-box d-flex justify-content-center">
                                    <img src="{{ filePath($product_two->image)}}" alt="{{ $product_two->name }}">
                                </div>
                                

                                <div class="product-cont-box text-center">
                                                            <h5>
                                                                <a href="{{route('single.product',[$product_two->sku,$product_two->slug])}}">
                                                                    {{\Illuminate\Support\Str::limit($product_two->name,20)}}
                                                                </a>
                                                            </h5>
                                                            <div class="price text-center d-flex justify-content-center">
                                                                @if (vendorActive())
                                                                <span>
                                                                    {{formatPrice(brandProductPrice($product_two->sellers)->min())
                                                                           == formatPrice(brandProductPrice($product_two->sellers)->max())
                                                                           ? formatPrice(brandProductPrice($product_two->sellers)->min())
                                                                           : formatPrice(brandProductPrice($product_two->sellers)->min()).
                                                                           '-' .formatPrice(brandProductPrice($product_two->sellers)->max())}}
                                                                </span>
                                                                @else
                                                                
                                                                @if($product_two->is_discount)
                                                                    <span class="">
                                                                    {{formatPrice($product_two->discount_price)}}
                                                                </span>
                                                                    <del class="">
                                                                    {{formatPrice($product_two->product_price)}}
                                                                </del>
                                                                @else
                                                                    <span class="">
                                                                    {{formatPrice($product_two->product_price)}}
                                                                    </span>
                                                                @endif

                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="icons-link-wrapper">

                                                            @auth()
                                                                <a href="javascript:;" onclick="addToWishlist({{$product_two->id}})">
                                                                    <span class="heart social_icon"><i class="fas fa-heart"></i></span>
                                                                </a>
                                                            @endauth

                                                            @guest()
                                                                    <a href="javascript:;" 
                                                                    onclick="addToWishlist({{$product_two->id}})"
                                                                    data-title="@translate(Add to wishlist)"
                                                                    data-toggle="tooltip" 
                                                                    data-product_name='{{ $product_two->name }}' 
                                                                    data-product_id='{{$product_two->id}}' 
                                                                    data-product_sku='{{$product_two->sku}}' 
                                                                    data-product_slug='{{$product_two->slug}}' 
                                                                    data-product_image='{{ filePath($product_two->image) }}' 
                                                                    data-app_url='{{ env('APP_URL') }}' 
                                                                    data-product_price='{{formatPrice(brandProductPrice($product_two->sellers)->min())
                                                                                                    == formatPrice(brandProductPrice($product_two->sellers)->max())
                                                                                                    ? formatPrice(brandProductPrice($product_two->sellers)->min())
                                                                                                    : formatPrice(brandProductPrice($product_two->sellers)->min()).
                                                                                                    '-' .formatPrice(brandProductPrice($product_two->sellers)->max())}}'><span class="heart social_icon"><i class="fas fa-heart"></i></span></a>
                                                            @endguest

                                                            <a href="javascript:;" onclick="addToCompare({{$product_two->id}})"><span class="reload social_icon"><i class="fa fa-random"></i></span></a>
                                                            <a href="javascript:;" onclick="forModal('{{ route('quick.view',$product_two->slug) }}', '@translate(Product quick view)')"><span class="preview social_icon" ><i class="fa fa-eye"></i></span></a>
                                                        </div>

                            </div>
                                                    </div>

                                                @endforeach
                                            @endforeach
                                        @endforeach

                                    </div>
                                </div>


                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                    @foreach($category_products as $category_product)
                                        @foreach($category_product->subCategoryProducts as $product)


                                            <div class="ps-product ps-product--wide">
                                                <div class="ps-product__thumbnail"><a
                                                            href="{{ route('single.product',[$product->sku,$product->slug]) }}">
                                                        <img src="{{ filePath($product->image) }}" class="rounded"
                                                             alt="#{{ $product->name }}"></a>
                                                </div>
                                                <div class="ps-product__container">
                                                    <div class="ps-product__content"><a class="ps-product__title"
                                                                                        href="{{ route('single.product',[$product->sku,$product->slug]) }}">{{ $product->name }}</a>

                                                        {!! $product->short_desc !!}
                                                    </div>
                                                    <div class="ps-product__shopping">
                                                               <span class="t-mt-10 d-block">
                                                                    <span class="product-card__discount-price t-mr-5">
                                                                                                               {{formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                                  == formatPrice(brandProductPrice($product->sellers)->max())
                                                                                                                  ? formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                                  : formatPrice(brandProductPrice($product->sellers)->min()).
                                                                                                                  '-' .formatPrice(brandProductPrice($product->sellers)->max())}}
                                                                                                           </span>
                                                                                                           </span>


                                                        <a class="ps-btn"
                                                           href="{{ route('single.product',[$product->sku,$product->slug]) }}">Buy
                                                            Now</a>
                                                        <ul class="ps-product__actions">

                                                            <li>
                                                                @auth()
                                                                    <a data-toggle="tooltip" data-placement="top"
                                                                       title="Add to Whishlist" href="#!"
                                                                       onclick="addToWishlist({{$product->id}})"><i
                                                                                class="icon-heart"></i></a>
                                                                @endauth
                                                                @guest()
                                                                    <a 
                                                                class="wishlist"
                                                                data-placement="top" 
                                                                data-title="@translate(Add to wishlist)"
                                                                data-toggle="tooltip" 
                                                                data-product_name='{{ $product->name }}' 
                                                                data-product_id='{{$product->id}}' 
                                                                data-product_sku='{{$product->sku}}' 
                                                                data-product_slug='{{$product->slug}}' 
                                                                data-product_image='{{ filePath($product->image) }}' 
                                                                data-app_url='{{ env('APP_URL') }}' 
                                                                data-product_price='{{formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                == formatPrice(brandProductPrice($product->sellers)->max())
                                                                                                ? formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                : formatPrice(brandProductPrice($product->sellers)->min()).
                                                                                                '-' .formatPrice(brandProductPrice($product->sellers)->max())}}'    
                                                                >
                                                                    <i class="fas fa-heart"></i>
                                                                </a>
                                                                @endguest


                                                                


                                                            </li>
                                                            <li>
                                                                <a href="#!" onclick="addToCompare({{$product->id}})"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Compare"><i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                        @endforeach

                                        @foreach($category_product->frontCategoryProducts as $cat_product)
                                            @foreach($cat_product->CategoryProducts as $product)

                                                    <div class="ps-product ps-product--wide">
                                                        <div class="ps-product__thumbnail"><a
                                                                    href="{{ route('single.product',[$product->sku,$product->slug]) }}">
                                                                <img src="{{ filePath($product->image) }}" class="rounded"
                                                                     alt="#{{ $product->name }}"></a>
                                                        </div>
                                                        <div class="ps-product__container">
                                                            <div class="ps-product__content"><a class="ps-product__title"
                                                                                                href="{{ route('single.product',[$product->sku,$product->slug]) }}">{{ $product->name }}</a>

                                                                {!! $product->short_desc !!}
                                                            </div>
                                                            <div class="ps-product__shopping">
                                                               <span class="t-mt-10 d-block">
                                                                    <span class="product-card__discount-price t-mr-5">
                                                                                                              {{formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                                  == formatPrice(brandProductPrice($product->sellers)->max())
                                                                                                                  ? formatPrice(brandProductPrice($product->sellers)->min())
                                                                                                                  : formatPrice(brandProductPrice($product->sellers)->min()).
                                                                                                                  '-' .formatPrice(brandProductPrice($product->sellers)->max())}}
                                                                                                           </span>
                                                                                                           </span>


                                                                <a class="ps-btn"
                                                                   href="{{ route('single.product',[$product->sku,$product->slug]) }}">Buy
                                                                    Now</a>
                                                                <ul class="ps-product__actions">

                                                                    <li>
                                                                        @auth()
                                                                            <a data-toggle="tooltip" data-placement="top"
                                                                               title="Add to Whishlist" href="#!"
                                                                               onclick="addToWishlist({{$product->id}})"><i
                                                                                        class="icon-heart"></i></a>
                                                                        @endauth
                                                                        @guest()
                                                                            <a data-toggle="tooltip" data-placement="top"
                                                                               title="Add to Whishlist"
                                                                               href="{{route('login-redirect')}}?url={{url()->current()}}"><i
                                                                                        class="icon-heart"></i></a>
                                                                        @endguest
                                                                    </li>
                                                                    <li>
                                                                        <a href="#!" onclick="addToCompare({{$product->id}})"
                                                                           data-toggle="tooltip" data-placement="top"
                                                                           title="Compare"><i class="fa fa-random"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal d-none" id="shop-filter-lastest" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="list-group d-none">
                                <a class="list-group-item list-group-item-action" href="#">Sort
                                    by</a><a class="list-group-item list-group-item-action" href="#">Sort by average
                                    rating</a><a class="list-group-item list-group-item-action" href="#">Sort by
                                    latest</a><a class="list-group-item list-group-item-action" href="#">Sort by price:
                                    low to high</a><a class="list-group-item list-group-item-action" href="#">Sort by
                                    price: high to low</a><a class="list-group-item list-group-item-action text-center"
                                                             href="#" data-dismiss="modal"><strong>Close</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

