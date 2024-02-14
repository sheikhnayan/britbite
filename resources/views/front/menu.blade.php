
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
                    <div class="col-lg-6 col-md-12 p-0">
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
                                        <li class="menu-section-item ng-scope" data-id="{{ $item->id }}">
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
                                                      @php
                                                          $offer = DB::table('offers')->where('user_id',$item->user_id)->latest()->first();
                                                      @endphp
                                                      @if ($offer)
                                                      @if ($offer->status == 1)
                                                      £{{ ($item->price/100)*$offer->percentage }}
                                                      <strike>£{{ $item->price }}</strike>
                                                      @else
                                                      £{{ $item->price }}
                                                      @endif
                                                      @else
                                                      £{{ $item->price }}
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
                    <div class="col-lg-3 col-md-12 p-2">
                      <h4 class="order_summary">My Order</h4>
                      @php
                          $cart = session()->get('cart');
                      @endphp
                      @if ($cart == null)
                      <div class="order-empty ng-scope" style="">
                         <!-- ngIf: page == 'app.foods' -->
                         <img src="{{ asset('sad.png') }}" class="ng-scope">
                         <!-- end ngIf: page == 'app.foods' -->
                         <!-- ngIf: page == 'app.remote' -->
                         <!-- ngIf: page == 'app.hotels.foods' -->
                         <div class="t-center">
                          <p><strong class="ng-binding">Your basket is empty!</strong></p>
                          <p class="ng-binding">Let's change that.</p>
                        </div>
                      </div>
                      @else
                      <div class="order-content" id="my-order" ng-show="order.items.length" style="">
                        @foreach ($cart as $key => $item)
                          <div order-items="" class="ng-scope">
                            <!-- ngRepeat: item in order.items track by $index -->
                            <div class="order-item handy-media right tight m-base-tight ng-scope" ng-repeat="item in order.items track by $index" ng-click="setCurrentFood($index)" ng-class="($index == currentWokNo)? 'active':''" style="">
                              <div>
                                <div class="img item-price ng-binding"> £{{ $item['price'] }} </div>
                                <div class="body item-details handy-media left tight">
                                  <a href="/remove-from-cart/{{ $key }}" class="close" style="float: left; color: red;">
                                    <span aria-hidden="true">&times;</span>
                                  </a>
                                  <div class="body">
                                      <p class="item-name"> <span class="ng-binding">{{ $item['quantity'] }} x {{ $item['name'] }}</span>
                                        @if ($item['data']['buy_type']=='get')
                                        <span class="popular-choice m-base-tighter ng-scope">
                                            Buy
                                            {{ $item['data']['buy'] }}
                                            Get,
                                            {{ $item['data']['buy_get'] }}
                                            Free</span>
                                        @endif
                                        @if ($item['data']['buy_type']=='offer')
                                        <span class="popular-choice m-base-tighter ng-scope">
                                            Buy
                                            {{ $item['data']['buy'] }}
                                            Get,
                                            {{ $item['data']['buy_offer'] }}%
                                            Offer</span>
                                        @endif
                                      </p>
                                    </div>
                                  </div>
                                  @if ($item['attr'])
                                  <p class="handy-media left tight option ng-scope">
                                    <!-- ngIf: currentWokNo != undefined -->
                                    <span class="body ng-binding">{{ $item['attr']['name'] }} <i class="ng-binding"> + £{{ $item['attr']['price'] }}</i></span>
                                  </p>
                                  @endif
                                </div> <!-- ngIf: invalidWok($index) -->
                              </div><!-- end ngRepeat: item in order.items track by $index -->
                            </div>
                        @endforeach
                          <div order-totals="" class="ng-scope">
                            <div class="order-totals">
                              <div class="handy-media right tight subtotal">
                                @php
                                    $attr = 0;
                                    foreach ($cart as $value) {
                                      # code...
                                      if ($value['attr']) {
                                        # code...
                                        $attr += $value['attr']['price'] * $value['quantity'];
                                      }
                                    }
                                @endphp
                                <p class="img value ng-binding">£{{ array_sum(array_column($cart, 'price')) + $attr }}</p>
                                <p class="label body ng-binding">Subtotal</p>
                              </div>
                            </div>

                            <button class="menu-checkout-button ng-binding ng-scope">
                              <i class="fa fa-shopping-cart m-right-tight"></i>CHECKOUT
                            </button>
                          </div>
                          </div>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@if (Session::get('cart'))
  @php
      $html = '';
      $percen = '%';
      foreach ($cart as $key => $c) {
        if ($c['data']['buy_type'] == 'get') {
          # code...
          $offer = 'Buy%20'.$c['data']['buy'].'%20Get,%20'.$c['data']['buy_get'].'%20Free';
        }else {
          $offer = 'Buy%20'.$c['data']['buy'].'%20Get,'.$percen.''.$c['data']['buy_offer'].'%20Off';
        }

        $attrs = '';

        if ($c['attr'] != null) {
            # code...
            $a = $c['attr']['name'].'%20+%20£'.$c['attr']['price'];

            $attrs .= $a;

        }

        $h = $c['quantity'].'%20x%20'.$c['name'].'%20('.$offer.')%20%20£'.$c['price'].'%0A'.$attrs.'%0A';

        $html .= $h;

      }


        $total = '%0ASubtotal%20%20£'.array_sum(array_column($cart, 'price')) + $attr;

        $html .= $total;

  @endphp
@endif
<input type="hidden" id="cart" value="{{ $html ?? null}}">
<div class="modal add-to-cart" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('add-to-cart') }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title cart-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body cart-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add to Order</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal customer" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-4">
      <form action="#" id="booking" onsubmit="event.preventDefault();">
        <div class="control-group">
            <div class="input-group">
                <input type="text" id="formname" value="" name="name" class="form-control" placeholder="Name" required="required" />
                <div class="input-group-append">
                    <div class="input-group-text"><i class="far fa-user"></i></div>
                </div>
            </div>
          </div>
          <div class="control-group mt-4">
              <div class="input-group">
                  <input type="text" class="form-control" value="" id="formmobile" name="mobile" placeholder="Mobile" required="required" />
                  <div class="input-group-append">
                      <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                  </div>
              </div>
          </div>
          <input type="hidden" name="phones" id="phones" value="{{ $setting->phone }}">
          <div class="mt-4 text-center">
              <button class="btn custom-btn" type="submit">Place order through store whatsapp</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- Menu End -->
@endsection

@section('script')
  <script>
    $('.menu-section-item').on('click', function(){
      id = $(this).data('id');

      $.ajax({
          url: "/cart/"+id,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
              title = 'Set Extra Option - '+res.name;
              $('.cart-title').html(title)

              atts = ``;

              res.attribute.forEach(element => {
                  att = `<label class="body option-label ng-binding">
                          <input type="radio" name="attr"  value="`+element.id+`" class="option-radio ng-valid ng-not-empty ng-dirty ng-touched ng-valid-parse" style="">
                          `+element.name+`
                          £`+element.price+`</label> <br>`;

                  atts += att;
              });

              atts += `<input type="hidden" name="menu_id" value="`+res.id+`" >`;

              $('.cart-body').html(atts);


              $('.add-to-cart').modal('show');
          }
      });
    })
  </script>
  <script>
    $('.menu-checkout-button').on('click', function(){
        $('.customer').modal('show');
    })
  </script>
  <script>
    $('#booking').submit(function() {
      var formEl = document.forms.booking;
      var formData = new FormData(formEl);
      name = formData.get('name');
      mobile = formData.get('mobile');
      phone = formData.get('phones');

      var value = $('#cart').val();

      // console.log(value);

      window.open('https://wa.me/'+phone+'?text='+value+'%0AName:%20'+name+'%0AMobile:%20'+mobile, '_blank')

      // window.location.href = 'https://wa.me/8801980265838?text=Name:%20'+name+'%0AEmail:%20'+email+'%0AMobile:%20'+mobile+'%0ADate:%20'+date+'%0ATime:%20'+time+'%0AGuest:%20'+guest;

      return false;
    });
  </script>
@endsection

