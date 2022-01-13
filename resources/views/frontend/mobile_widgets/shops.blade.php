<div class="container mobile-view">
        <div class="v3_mobile-common-title-wrapper">
            <div class="common-title">@translate(Shops) </div>
            <a href="{{ route('vendor.shops') }}" class="linkall">@translate(view all)</a>
        </div>

        <!-- best seller wrapper -->
        <div class="v3_brand-seller-wrapper">
            <div class="v3_mobile_brand_slider">

            @forelse ($shop_by_store = App\User::where('user_type','Vendor')->latest()->paginate(paginate()) as $store)
            @if($store->vendor != null)
                <div class="col-6 col-sm-6">
                    <div class="v3_mobile_single-brand">
                        <div class="img-box">

                            @if (empty($store->vendor->shop_logo))
                                                <img src="{{asset('vendor-store.jpg')}}" alt="{{ $store->vendor->shop_name }}"
                                                    class="rounded">
                                                @else
                                                <img src="{{ asset($store->vendor->shop_logo) }}" alt="{{ $store->vendor->shop_name }}"
                                                    class="rounded">
                                                @endif

                        </div>
                        <div class="cont-box">
                            <span class="fea-title">{{ $store->vendor->shop_name }}</span>
                            <span class="fea-subtitle">{{ seller_product_count($store->vendor->user_id) }} Products</span>
                        </div>
                    </div>
                </div>
             @endif
                @empty
                <div class="col-md-12 col-sm-12">
                <img src="{{ asset('shop-not-found.png') }}" alt="">
            </div>
                @endforelse

            </div>
        </div>

    </div>