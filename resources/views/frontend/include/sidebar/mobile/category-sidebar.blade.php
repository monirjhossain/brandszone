@if (config('manyvendor.mobile_categroy') == 'old')
    <div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>@translate(Categories)</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
          @foreach(categories(9,null) as $gCat)
                @if($gCat->childrenCategories->count() > 0)
            <li class="current-menu-item menu-item-has-children has-mega-menu">
              <a href="{{ route('category.shop',$gCat->slug) }}">{{ trans('categories.'. $gCat->name) }}</a>
              <span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                      @foreach($gCat->childrenCategories as $pCat)
                        <h4>{{$pCat->name}}<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                          @foreach($pCat->childrenCategories as $sCat)
                            <li class="current-menu-item ">
                              <a href="{{ route('category.shop',$sCat->slug) }}">{{ trans('categories.'. $sCat->name) }}</a>
                            </li>
                          @endforeach
                        </ul>
                      @endforeach
                    </div>
                </div>
            </li>
                @endif
        @endforeach
        </ul>
    </div>
</div>

@else

<div class="mobile-all-category-list" id="navigation-mobile">
     
        <div class="container">
            <span class="all-cat-title">@translate(categories)</span>
            <div class="row">
                <!-- navigation -->
                <div class="col-3 col-sm-2 col-lg-1">
                    <ul class="nav" id="myTab" role="tablist">
                        
                        @foreach(categories(9,null) as $gCat)
                          @if($gCat->childrenCategories->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}" 
                              id="cat-{{ $gCat->id }}-tab" 
                              data-toggle="tab" 
                              href="#cat-{{ $gCat->id }}" 
                              role="tab"
                              aria-controls="home" 
                              aria-selected="true">
                                <span class="mobile-single-cate">
                                    <i class="v3_cate_img {{ $gCat->icon }}"></i>
                                    <span class="cate-title">
                                        {{ trans('categories.'. $gCat->name) }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                   
                    </ul>
                </div>
                <!-- navigation content -->
                <div class="col-9 col-sm-10  col-lg-11">
                    <div class="tab-content" id="myTabContent">
                        <!-- single item all have an unique id ex: cat-one / cat-one-tab that matches with the upper navigation -->

                        @foreach(categories(9,null) as $gCat)
                          @if($gCat->childrenCategories->count() > 0)
                            @foreach($gCat->childrenCategories as $pCat)
                              <div class="tab-pane fade {{ $loop->iteration == 1 ? 'show active' : '' }}" id="cat-{{ $gCat->id }}" role="tabpanel"
                                  aria-labelledby="cat-{{ $gCat->id }}-tab">
                                  <div class="cat-content-wrapper">
                                      <span class="categories-title">
                                        <a href="{{ route('category.shop',$pCat->slug) }}">
                                          {{ trans('categories.'. $pCat->name) }}
                                        </a>
                                      </span>
                                      <ul class="mobile-cate-menu mt-3">
                                        @foreach($pCat->childrenCategories as $sCat)
                                          <li><a href="{{ route('category.shop',$sCat->slug) }}">{{ trans('categories.'. $sCat->name) }}<span class="cat-arrow"><i
                                                          class="fas fa-angle-right"></i></span></a>
                                          </li>
                                        @endforeach
                                      </ul>
                                  </div>

                                  <span class="divider mt-4 d-block">
                                      <hr>
                                  </span>

                              </div>
                            @endforeach
                          @endif
                        @endforeach

                      </div>
                </div>
            </div>
        </div>
    </div>

@endif




    