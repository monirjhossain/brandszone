<div class="container mobile-view">
        <div class="v3_mobile-common-title-wrapper">
            <div class="common-title">@translate(Brands) </div>
            <a href="{{ route('brands') }}" class="linkall">@translate(view all)</a>
        </div>


        <!-- best seller wrapper -->
        <div class="v3_brand-seller-wrapper">
            <div class="v3_mobile_brand_slider">

            @forelse (brands(16) as $brand)
                <div class="col-6 col-sm-6">
                    <div class="v3_mobile_single-brand">
                        <div class="img-box">

                            @if (empty($brand->logo))
                                                <img src="{{asset('vendor-store.jpg')}}" alt="{{ $brand->name }}"
                                                    class="rounded">
                                                @else
                                                <img src="{{ filePath($brand->logo) }}" alt="{{ $brand->name }}"
                                                    class="rounded">
                                                @endif

                        </div>
                        <div class="cont-box">
                            <span class="fea-title">{{\Illuminate\Support\Str::limit($brand->name,14)}}</span>
                            <span class="fea-subtitle">{{ brandProductsCount($brand->slug) }} Products</span>
                        </div>
                    </div>
                </div>
            @empty
            <img src="{{ asset('No-Brand-Found.jpg') }}" class="img-fluid" alt="#no-brand-found">
            @endforelse

            </div>
        </div>

    </div>