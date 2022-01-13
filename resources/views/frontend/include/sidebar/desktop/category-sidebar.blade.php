<div class="col-lg-3 d-none d-lg-block">
    <div class="v3-categories wow fadeInUp">

        <!-- start -->
        <ul class="cat-wrapper">

            @foreach(categories(100,null) as $gCat)
            @if($gCat->childrenCategories->count() > 0)
            <li class="has-sublist d-flex align-items-center"> <i class="{{ $gCat->icon }}"></i><a
                    href="{{ route('category.shop',$gCat->slug) }}">{{ trans('categories.' . $gCat->name) }} <span class="arrow-icon"><i
                            class="fas fa-chevron-right"></i></span></a>

                <div class="mega-wrapper">

                    <ul class="mega-menu">
                        @foreach($gCat->childrenCategories as $pCat)
                        @if($pCat->childrenCategories->count() > 0)
                        <li class="mega-item">
                            <ul>

                                <li class="title mt-10">{{ trans('categories.' . $pCat->name) }}</li>
                                @foreach($pCat->childrenCategories as $sCat)
                                <li><a href="{{ route('category.shop',$sCat->slug) }}">{{ trans('categories.'. $sCat->name) }}</a></li>
                                @endforeach

                            </ul>

                        </li>

                        @endif
                        @endforeach

                    </ul>

                </div>

            </li>
            @endif
            @endforeach


        </ul>
        <!-- end -->

    </div>
</div>