{{-- @if(subCategory()->count() >0)
    <div class="ps-search-trending">
        <div class="container">
            <div class="ps-section__header">
                <h3>@translate(Trending)<span></span></h3>
            </div>
            <div class="ps-section__content">
                <div class="ps-block--categories-tabs ps-tab-root" style="box-shadow: none">

                    <div class="ps-tabs">
                        <div class="ps-tabs">
                            @foreach(subCategory() as $subCat)
                                <div class="ps-tab p-0 mt-3 active">
                                    <div class="row">

                                        @php
                                            $trending_products = 0;
                                        @endphp

                                    @foreach($subCat->products as $product)

                                    <input type="hidden" value="{{ $trending_products++ }}">

                                        <div class="col-md-3 col-xl-3 t-mb-30 wow fadeInUP">


                                            <a href="{{route('single.product',[$product->sku,$product->slug])}}" class="">
                                              
                                                    <div class="single-product">
                                                        <div class="upper-content">
                                                            <span class="batch">trending</span>
                                                        </div>
                                                        <div class="img-box d-flex justify-content-center">
                                                            <img src="{{ filePath($product->image)}}" alt="{{\Illuminate\Support\Str::limit($product->name,14)}}">
                                                        </div>


                                                        <div class="product-cont-box text-center">
                                                            <h5><a href="#">{{\Illuminate\Support\Str::limit($product->name,14)}}</a>
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
                                                                <a href="javascript:;" onclick="addToWishlist({{$product->id}})"><span class="heart social_icon"><i class="fas fa-heart"></i></span></a>
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
                                                    




                                            </a>

                                        </div>

                                        @if ($trending_products == 18)
                                                            @break
                                                        @endif

                                    @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}
