<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>@translate(Menu)</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            @if(vendorActive())
                <li><a href="{{ route('all.product') }}">@translate(All Products)</a></li>
                <li><a href="{{ route('vendor.shops') }}">@translate(All Shops)</a></li>
                <li><a href="{{ route('brands') }}">@translate(All Brands)</a></li>
                <li><a href="{{ route('customer.campaigns.index') }}">@translate(Campaigns)</a></li>
                <li><a href="{{ route('vendor.signup') }}">@translate(Be a seller)</a></li>
                @if(affiliateRoute() && affiliateActive())
                    @auth
                        @if(Auth::user()->user_type != "Admin" && Auth::user()->user_type != "Vendor")
                            <li><a href="{{ route('customers.affiliate.registration') }}">@translate(Affiliate Marketing)</a></li>
                        @endif
                    @endauth
                    @guest
                        <li><a href="{{ route('customers.affiliate.registration') }}">@translate(Affiliate Marketing)</a></li>
                    @endguest
                @endif
            @else
                <li><a href="{{ route('all.product') }}">@translate(All Products)</a></li>
                <li><a href="{{ route('customer.campaigns.index') }}">@translate(Campaigns)</a></li>
                @if(affiliateRoute() && affiliateActive())
                    @auth
                        @if(Auth::user()->user_type != "Admin" && Auth::user()->user_type != "Vendor")
                            <li><a href="{{ route('customers.affiliate.registration') }}">@translate(Affiliate Marketing)</a></li>
                        @endif
                    @endauth
                    @guest
                        <li><a href="{{ route('customers.affiliate.registration') }}">@translate(Affiliate Marketing)</a></li>
                    @endguest
                @endif
            @endif

            {{-- Currency --}}
            <li class="menu-item-has-children">
                <a href="javascript:;">

                    <img width="25" 
                         height="auto" 
                         src="{{ asset("images/lang/". activeCurrencyFlag()) }}"
                         alt="">

                    {{Str::ucfirst(defaultCurrency())}}

                </a><span class="sub-toggle"></span>
                    <ul class="sub-menu" style="display: none;">
                        @foreach(\App\Models\Currency::where('is_published',true)->get() as $item)
                        <li>

                            <a href="{{route('frontend.currencies.change')}}" 
                               onclick="event.preventDefault();
                               document.getElementById('{{$item->name}}').submit()">

                               <img width="25" 
                                 height="auto" 
                                 src="{{ asset("images/lang/". $item->image) }}"
                                 alt="">

                               {{$item->name}}

                            </a>

                            <form id="{{$item->name}}" 
                                  class="d-none"
                                  action="{{ route('frontend.currencies.change') }}"
                                  method="POST">
                                @csrf
                                <input type="hidden" name="code" value="{{$item->id}}">
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </li>
            {{-- Currency::END --}}

            {{-- Language --}}
            <li class="menu-item-has-children">
                <a href="javascript:;">

                    <img width="25" 
                         height="auto" 
                         src="{{ asset("images/lang/". activeLanguageFlag(activeLanguage())) }}"
                         alt="">

                    {{ activeLanguageCountryName(activeLanguage()) }}

                </a><span class="sub-toggle"></span>
                    <ul class="sub-menu" style="display: none;">
                        @foreach(\App\Models\Language::all() as $language)
                        <li>

                            <a href="{{route('frontend.language.change')}}" 
                               onclick="event.preventDefault();
                               document.getElementById('{{$language->name}}').submit()">

                               <img width="25" 
                                 height="auto" 
                                 src="{{ asset("images/lang/". $language->image) }}"
                                 alt="">

                               {{$language->name}}

                            </a>

                            <form id="{{$language->name}}" class="d-none"
                                    action="{{ route('frontend.language.change') }}"
                                    method="POST">
                                @csrf
                                <input type="hidden" name="code" value="{{$language->code}}">
                            </form>
                            
                        </li>
                        @endforeach
                    </ul>
                </li>
            {{-- Language::END --}}




        </ul>
    </div>
</div>
