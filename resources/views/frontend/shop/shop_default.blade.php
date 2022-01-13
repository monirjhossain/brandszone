@extends('frontend.master')


@section('title','Shop')

@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{ route('homepage') }}">@translate(Home)</a></li>
                <li>@translate(All Products)</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop">
        <div class="ps-container">

            <div class="ps-block__header t-pt-50">
                <h3>@translate(New Brands)</h3>
            </div>

            <div class="ps-block__content t-pb-30 no-border-col">
                            <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="true"
                                 data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                                 data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                                 data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000"
                                 data-owl-mousedrag="on">

                                @forelse (brands(16) as $brand)
                                <div class="single-product">
                                        

                                    <div class="img-box d-flex justify-content-center">
                                        @if (empty($brand->logo))
                                            <img src="{{ asset('vendor-store.jpg') }}"
                                                 alt="#{{ $brand->name }}">
                                        @else
                                            <img src="{{ filePath($brand->logo) }}"
                                                 alt="#{{ $brand->name }}">
                                        @endif
                                    </div>
                                

                                    <div class="product-cont-box text-center">
                                        <h5>
                                            {{ $brand->name }}
                                        </h5>
                                    
                                    </div>


                                </div>

                                @endforeach

                            </div>
                        </div>
            {{-- brand list --}}

            <div class="ps-shop-categories d-none">
                <div class="row align-content-lg-stretch">
                    @foreach (categories(10, null) as $home_category)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--category-2 br-10" data-mh="categories">
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
                <div class="">
                    <div class="ps-block--shop-features show-products-mobile">
                        <div class="ps-block__header t-pt-50">
                            <h3>@translate(Best Sale Items)</h3>
                        </div>
                        <div class="ps-block__content t-pb-30 no-border-col">
                            <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="true"
                                 data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                                 data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                                 data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000"
                                 data-owl-mousedrag="on">

                                @foreach (sale_products(10) as $sale_items)
                                    @foreach ($sale_items->sale_products as $sale_item)
                                        <div class="single-product">
                                            <div class="upper-content">

                                                @if($sale_item->is_discount)
                                                    <span class="batch">sale</span>
                                                @endif

                                            </div>

                                <div class="img-box d-flex justify-content-center">
                                    <img src="{{ filePath($sale_item->image)}}" alt="{{ $sale_item->name }}">
                                </div>
                                

                                            <div class="product-cont-box text-center">
                                                <h5>
                                                    <a href="{{route('single.product',[$sale_item->sku,$sale_item->slug])}}">
                                                        {{\Illuminate\Support\Str::limit( trans('products.'. $sale_item->name),20)}}
                                                    </a>
                                                </h5>
                                                <div class="price text-center d-flex justify-content-center">
                                                    @if (vendorActive())
                                                    <span>
                                                        {{formatPrice(brandProductPrice($sale_item->sellers)->min())
                                                                == formatPrice(brandProductPrice($sale_item->sellers)->max())
                                                                ? formatPrice(brandProductPrice($sale_item->sellers)->min())
                                                                : formatPrice(brandProductPrice($sale_item->sellers)->min()).
                                                                '-' .formatPrice(brandProductPrice($sale_item->sellers)->max())}}
                                                    </span>
                                                    @else
                                                    
                                                    @if($sale_item->is_discount)
                                                        <span class="">
                                                        {{formatPrice($sale_item->discount_price)}}
                                                    </span>
                                                        <del class="">
                                                        {{formatPrice($sale_item->product_price)}}
                                                    </del>
                                                    @else
                                                        <span class="">
                                                        {{formatPrice($sale_item->product_price)}}
                                                        </span>
                                                    @endif

                                                    @endif

                                                </div>
                                            </div>

                                            <div class="icons-link-wrapper">

                                                @auth()
                                                    <a href="javascript:;" onclick="addToWishlist({{$sale_item->id}})">
                                                        <span class="heart social_icon"><i class="fas fa-heart"></i></span>
                                                    </a>
                                                @endauth

                                                @guest()
                                                        <a href="javascript:;" 
                                                        onclick="addToWishlist({{$sale_item->id}})"
                                                        data-title="@translate(Add to wishlist)"
                                                        data-toggle="tooltip" 
                                                        data-product_name='{{ $sale_item->name }}' 
                                                        data-product_id='{{$sale_item->id}}' 
                                                        data-product_sku='{{$sale_item->sku}}' 
                                                        data-product_slug='{{$sale_item->slug}}' 
                                                        data-product_image='{{ filePath($sale_item->image) }}' 
                                                        data-app_url='{{ env('APP_URL') }}' 
                                                        data-product_price='{{formatPrice(brandProductPrice($sale_item->sellers)->min())
                                                                                        == formatPrice(brandProductPrice($sale_item->sellers)->max())
                                                                                        ? formatPrice(brandProductPrice($sale_item->sellers)->min())
                                                                                        : formatPrice(brandProductPrice($sale_item->sellers)->min()).
                                                                                        '-' .formatPrice(brandProductPrice($sale_item->sellers)->max())}}'><span class="heart social_icon"><i class="fas fa-heart"></i></span></a>
                                                @endguest

                                                <a href="javascript:;" onclick="addToCompare({{$sale_item->id}})"><span class="reload social_icon"><i class="fa fa-random"></i></span></a>
                                                <a href="javascript:;" onclick="forModal('{{ route('quick.view',$sale_item->slug) }}', '@translate(Product quick view)')"><span class="preview social_icon" ><i class="fa fa-eye"></i></span></a>
                                            </div>

                                         </div>


                                    @endforeach
                                @endforeach

                            </div>
                        </div>

                        <div class="ps-shopping ps-tab-root mt-3">
                            <div class="ps-shopping__header">
                                <p><strong> {{ total_products() }}</strong> @translate(Products found)</p>
                                <div class="ps-shopping__actions">
                                    <form action="{{ route('shop.filter') }}" method="GET" id="sort_form">
                                        <select class="ps-select" data-placeholder="Sort Items" name="sortby"
                                                id="sort_filter">
                                            <option value="latest">@translate(Sort by Latest)</option>
                                        </select>
                                    </form>
                                    <div class="ps-shopping__view">
                                        <p>View</p>
                                        <ul class="ps-tab-list">
                                            <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-shopping-product">
                                        <div class="row">

                                            @forelse(all_products() as $product)

                                                <div class="col-md-3 col-xl-2 t-mb-30 no-border-col wow fadeInUp">
                                                 


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
                                                                    {{\Illuminate\Support\Str::limit( trans('products.'. $product->name), 20)}}
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




                                            @empty
                                                <img src="{{ asset('no-product-found.png') }}" class="img-fluid" alt="#no-product-found">
                                            @endforelse

                                        </div>
                                    </div>

                                    {{ all_products()->links('frontend.include.pagination.paginate_shop') }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
