@if(vendorActive())
<div class="p-30 desktop-view brand-desktop-view-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="v3_header_title_area">
                    <span class="v3_header_title">@translate(Brands)</span>
                    <a href="{{ route('brands') }}" class="v3_all_link">@translate(view all)</a>
                </div>
            </div>
        </div>
        <div class="ps-section__content">
            <div class="ps-tab-root">
                <div class="ps-tabs">
                    <div class="ps-tabs">
                        <div class="ps-tab active mt-3">

                            <div class="row padding-left-right-15">
                                @forelse (brands(16) as $brand)
                                <div class="col-md-3 col-xl-3 t-mb-30 no-border-col wow fadeInUp">
                                    <a href="{{ route('brand.shop', $brand->slug) }}" class="">

                                        <div class="single-product padding-top-bot-50 h-100">
                                            <div class="img-box d-flex justify-content-center">
                                                @if (empty($brand->logo))
                                                <img src="{{asset('vendor-store.jpg')}}" alt="{{ $brand->name }}"
                                                    class="img-fluid mx-auto rounded">
                                                @else
                                                <img src="{{ filePath($brand->logo) }}" alt="{{ $brand->name }}"
                                                    class="img-fluid mx-auto rounded">
                                                @endif
                                            </div>
                                            <div class="product-cont-box text-center mt-3">
                                                <h4> {{\Illuminate\Support\Str::limit($brand->name,14)}} </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @empty
                                <img src="{{ asset('No-Brand-Found.jpg') }}" class="img-fluid" alt="#no-brand-found">
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
@includeWhen(true, 'frontend.mobile_widgets.brand')
{{-- Mobile View::END --}}


@endif