@if (config('manyvendor.live_campaign_desktop') == 'type1')

<div class="ps-deal-of-day mt-5">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>@translate(Live Campaigns)</h3>
                </div>
            </div>
            <a href="{{ route('customer.campaigns.index') }}" class="h3">@translate(View all)</a>
        </div>
        <div class="ps-section__content">
            <div class="row">
                
                @forelse(liveCampaign() as $campaign)
                <div class="col-md-6 col-xl-3 mb-5">
                    <a href="{{route('customer.campaign.products', $campaign->slug)}}" title="{{$campaign->title}}">
                        <div class="card card-body bd-light rounded-sm">
                            <img src="{{asset($campaign->banner)}}" class="img-fluid rounded-sm campaign-img"
                                alt="{{$campaign->title}}" />
                            @if ($campaign->end_at > Carbon\Carbon::now())
                            <span class="bg-danger p-2 text-white rounded-pill live-now">@translate(Live now)</span>
                            @else
                            <span class="bg-danger p-2 text-white rounded-pill live-now">@translate(Time Out)</span>
                            @endif
                        </div>
                    </a>
                    <div class="ps-block--countdown-deal mt-2 mb-2">
                        <figure class="m-auto">
                            <figcaption>@translate(End in):</figcaption>
                            <ul class="ps-countdown" data-time="{{ $campaign->end_at->format('F d, Y H:i:s') }}">
                                <li><span class="days"></span></li>
                                <li><span class="hours"></span></li>
                                <li><span class="minutes"></span></li>
                                <li><span class="seconds"></span></li>
                            </ul>
                        </figure>
                    </div>
                </div>
                @empty
                <div class="col-md-12 text-center text-danger fs-18 py-5 card card-body">
                    @translate(There is no campaign live now.)
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@elseif (config('manyvendor.live_campaign_desktop') == 'type2')

@if (liveCampaign()->count())

<!-- live campaign section -->
    <div class="v3_campaign-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="v3_header_title_area">
                        <span class="v3_header_title">@translate(Live Campaigns)</span>
                        <a href="{{ route('customer.campaigns.index') }}" class="v3_all_link">@translate(View all)</a>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse(liveCampaign() as $campaign)
                <div class="col-lg-6 mt-3 wow fadeInUp">
                    <a href="{{route('customer.campaign.products', $campaign->slug)}}" title="{{$campaign->title}}">
                        <img src="{{asset($campaign->banner)}}" alt="{{$campaign->title}}" class="rounded-corners w-100">
                    </a>
                </div>

                 @empty
                <div class="col-md-12 text-center text-danger fs-18 py-5 card card-body">
                    @translate(There is no campaign live now.)
                </div>
                @endforelse
              
            </div>
        </div>
    </div>

    @endif

     <!-- upcoming campaing section -->

     @if (UpcomingCampaign()->count())
         
    <div class="v3_upcoming-campaign-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="v3_header_title_area">
                        <span class="v3_header_title">@translate(upcoming campaigns)</span>
                        <a href="{{ route('customer.campaigns.index') }}" class="v3_all_link">@translate(view all)</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4 row padding-left-right-15">

            @forelse(UpcomingCampaign() as $upcoming_campaign)
                <div class="col-lg-6 mt-5 wow fadeInUp">
                    <div class="v3_single-campaign">
                            <img src="{{asset($upcoming_campaign->banner)}}" 
                            alt="{{$upcoming_campaign->title}}" 
                            class="rounded-corners w-100">
                        <div class="count-box countdown d-flex justify-content-around mx-auto" 
                             data-countdown="{{ $upcoming_campaign->start_from->format('F d, Y H:i:s')}}"
                             id="countdown{{ $upcoming_campaign->id }}">
                            <div>
                                <span class="days count-title">00</span>
                                <p class="title-des">@translate(days)</p>
                            </div>
                            <span class="seperator">:</span>
                            <div>
                                <span class="hours count-title">00</span>
                                <p class="title-des">@translate(hour)</p>
                            </div>
                            <span class="seperator">:</span>
                            <div>
                                <span class="minutes count-title">00</span>
                                <p class="title-des">@translate(minutes)</p>
                            </div>
                            <span class="seperator">:</span>
                            <div>
                                <span class="seconds count-title">00</span>
                                <p class="title-des">@translate(seconds)</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-md-12 text-center text-danger fs-18 py-5 card card-body">
                @translate(There is no upcoming campaign.)
            </div>
            @endforelse

            </div>
        </div>
    </div>

     @endif
    
@endif

