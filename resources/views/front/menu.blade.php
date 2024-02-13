
@extends('front.layouts.main')

@section('content')

<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Food Menu</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('index',[$slug]) }}">Home</a>
                <a href="#">Menu</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Food Start -->
<div class="food mt-0">
    <div class="container">
        <div class="row align-items-center">
          @foreach ($category as $item)
          <div class="col-md-4">
              <div class="food-item">
                  <img width="150px" src="{{ asset($item->image) }}" class="img-fluid">
                  <h2>{{ $item->name }}</h2>
                  <p>
                      {{ $item->description }}
                  </p>
                  <a href="#sec-{{ $item->id }}">View Menu</a>
              </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
<!-- Food End -->


<!-- Menu Start -->
<div class="menu newdetails">
  <div class="container hh">
    <div class="container">
        {{-- new Design Flow --}}
        <div class="food_category mt-5">
            <div class="">
                <div class="row">
                    <div class="col-lg-3 col-md-12 mb-3 p-0">
                        <ul class="nav nav-pills flex-column experienceTab ss" id="experienceTab" role="tablist">

                          @foreach ($category as $cat)
                          <li class="nav-item">



                              <a
                                  class="nav-link"
                                  href="#sec-{{ $cat->id }}" role="tab"
                                  aria-controls="home">{{ $cat->name }}

                              </a>

                          </li>

                          @endforeach


                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-12 p-0">
                        <div class="tab-content pl-3" id="experienceTabContent" style="border-left: 0px !important;">
                            {{-- <div class="col-lg-5 col-md-12">
                                <div class="search_wrap">
                                    <input type="text" placeholder="Search" ng-model='search_menu_item'>
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div> --}}

                            {{-- Start --}}
                            <div class="tab-pane fade show active text-left" id="menu_item_box" role="tabpanel"
                                aria-labelledby="brunch-tab" style="padding-top: 0px !important">
                                @foreach ($category as $cats)
                                <div class="menu-section m-base ng-scope"
                                    {{-- ng-if="foods[section.id]" --}}
                                    style="" id="sec-{{ $cats->id }}">
                                    <div class="menu-section-image"
                                        style="background: #019377;">
                                        <div id="section0" class="menu-section-header">
                                            <h3 class="section-title ng-binding">{{ $cats->name }}</h3>
                                        </div>
                                    </div>
                                    <ul class="menu-section-items">
                                        <!-- ngRepeat: item in foods[section.id] | orderBy:'sorting' -->
                                        @foreach ($cats->menu as $item)
                                        <li class="menu-section-item ng-scope">
                                          <a class="food-item cart_detail_wrap pro-item-detail_cus">
                                                <div class="item-details"> <!-- ngIf: item.menu_item_image -->
                                                    <div class="menu-item-image ng-scope"
                                                        style="background-image: url({{ asset($item->image) }});">
                                                    </div><!-- end ngIf: item.menu_item_image -->
                                                    <!-- ngIf: page.indexOf('app.remote') == -1 && itemIsTopFood(item.id) -->
                                                    @if ($item->buy_type=='get')
                                                    <span class="popular-choice m-base-tighter ng-scope">
                                                        Buy
                                                        {{ $item->buy }}
                                                        Get,
                                                        {{ $item->buy_get }}
                                                        Free</span>
                                                    @endif
                                                    @if ($item->buy_type=='offer')
                                                    <span class="popular-choice m-base-tighter ng-scope">
                                                        Buy
                                                        {{ $item->buy }}
                                                        Get,
                                                        {{ $item->buy_offer }}%
                                                        Offer</span>
                                                    @endif
                                                    <h4 class="ng-binding">
                                                        <!-- <i ng-if="itemIsTopFood(item.id)" class="fa fa-star m-right-tighter"></i> -->{{ $item->name }}</h4> <!-- ngIf: item.description.trim() -->
                                                    <p class="m-top-tighter ng-binding ng-scope"
                                                        ng-if="item.description.trim()">{{ $item->description }}</p>
                                                    <!-- end ngIf: item.description.trim() -->
                                                </div>
                                                <!-- ngIf: (page.indexOf('hotels.') !== -1 && postcode) || page.indexOf('hotels.') === -1 -->
                                                <div class="item-price-holder ng-scope">
                                                    <div class="item-price ng-binding">
                                                      @if ($item->offer_price != null)
                                                      <strike>{{ $item->price }}</strike>
                                                      {{ $item->offer_price }}
                                                      @else
                                                      {{ $item->price }}
                                                      @endif
                                                        <i ng-class="(page.indexOf('butler24') !== -1) ? 'icon_plus_alt2' : 'fa fa-cart-plus'"
                                                            class="fa fa-cart-plus"></i>
                                                    </div>
                                                </div>
                                                <!-- end ngIf: (page.indexOf('hotels.') !== -1 && postcode) || page.indexOf('hotels.') === -1 -->
                                            </a>
                                          </li>

                                        @endforeach
                                        <!-- end ngRepeat: item in foods[section.id] | orderBy:'sorting' -->
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            {{-- End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Menu End -->
@endsection

@section('script')
{{-- <script>
  $(function() {
  const $header = $('.ss');
  let prevScroll = 0;

  $(window).scroll(function() {
      let scroll = $(window).scrollTop();
      console.log(scroll);
      if (scroll > 250) {
      $header.css('top','100px');
      } else {
      $header.css('top','600px');
      }
      prevScroll = scroll;
  });
  });
</script> --}}
@endsection

