<header class="header header--mobile" data-sticky="true">
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="{{ route('homepage') }}"><img
                    src="{{ filePath(getSystemSetting('type_logo'))}}" class="" alt=""></a></div>
        <div class="navigation__right">
            <div class="header__actions">
                {{-- Add Mobile header menu here --}}
                @auth
                    <div class="ps-cart--mini">
                        <a class="header__extra" href="{{ route('customer.track.order') }}">
                            <i class="icon-truck"></i>
                        </a>
                    </div>
                @endauth
                {{-- Add Mobile header menu here:END --}}
                <div class="ps-block--user-header">
                        @auth
                            <div class="ps-block__left">
                                @if (Auth::user()->user_type == 'Customer')
                                    <a href="{{ route('customer.index') }}">
                                        <img src="{{ filePath(Auth::user()->avatar) }}" class="ps-block--user-header-img w-100 img-fluid" alt="">
                                    </a>
                                @elseif (Auth::user()->user_type == 'Admin')
                                    <a href="{{ route('home') }}">
                                        <img src="{{ filePath(Auth::user()->avatar) }}" class="ps-block--user-header-img w-100 img-fluid" alt="">
                                    </a>
                                @elseif (Auth::user()->user_type == 'Vendor')
                                    <a href="{{ route('home') }}">
                                        <img src="{{ filePath(Auth::user()->avatar) }}" class="ps-block--user-header-img w-100 img-fluid" alt="">
                                    </a>
                                @else
                                    <i class="icon-user"></i>
                                @endif
                            </div>
                        @endauth

                        @guest
                            <div class="ps-block__left">
                                <a href="{{ route('login') }}">
                                    <i class="icon-user"></i>
                                </a>
                            </div>
                            @endguest
                </div>
            </div>
        </div>
    </div>
   
</header>
