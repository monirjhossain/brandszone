 @if(vendorActive()) 
 <div class="p-30 desktop-view">
    <div class="container">
      {{-- <div class="row">
          <div class="col-8">
              <div class="ps-section__header">
          <h3 class="text-capitalize">@translate(Shops)</h3>
      </div>
          </div>
          <div class="col-4 text-right">
              <a href="{{ route('vendor.shops') }}" class="h3">
                      @translate(View All)
              </a>
          </div>
      </div> --}}
      <div class="row">
        <div class="col-lg-12">
            <div class="v3_header_title_area">
                <span class="v3_header_title">@translate(Shops)</span>
                <a href="{{ route('vendor.shops') }}" class="v3_all_link">@translate(view all)</a>
            </div>
        </div>
    </div>
        <div class="ps-section__content">
            <div class="ps-block--categories-tabs ps-tab-root store_section">
                <div class="ps-tabs">
                    <div class="ps-tabs">
                        <div class="ps-tab active p-0 mt-3">

                        <div class="row padding-left-right-15">
                        @forelse ($shop_by_store = App\User::where('user_type','Vendor')->latest()->paginate(paginate()) as $store)
                       @if($store->vendor != null)
                        <div class="col-md-3 col-xl-3 t-mb-30 no-border-col wow fadeInUp">
                            <a href="{{ route('vendor.shop',$store->vendor->slug) }}" class="">

                            <div class="single-product padding-top-bot-50">
                                <div class="img-box d-flex justify-content-center">
                                    @if (empty($store->vendor->shop_logo))
                                    <img src="{{asset('vendor-store.jpg')}}" alt="{{ $store->vendor->shop_name }}" class="img-fluid mx-auto rounded">
                                    @else
                                    <img src="{{ asset($store->vendor->shop_logo) }}" alt="{{ $store->vendor->shop_name }}" class="img-fluid mx-auto rounded">
                                    @endif
                                </div>
                                <div class="product-cont-box text-center mt-3">
                                    <h4> {{ $store->vendor->shop_name }} </h4>
                                </div>
                            </div>

                            </a> 

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
                </div>
            </div>
        </div>
    </div>
</div> 


{{-- Mobile View --}}
@includeWhen(true, 'frontend.mobile_widgets.shops')
{{-- Mobile View::END --}}

 
@endif 

