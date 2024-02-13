@extends('front.layouts.main')

@section('content')

<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Book A Table</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('index',[$slug]) }}">Home</a>
                <a href="#">Booking</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Booking Start -->
<div class="booking">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="booking-content">
                    <div class="section-header">
                        <p>Book A Table</p>
                        <h2>Book Your Table For Private Dinners & Happy Hours</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="booking-form">
                  <form action="#" id="booking" onsubmit="event.preventDefault();">
                    <div class="control-group">
                        <div class="input-group">
                            <input type="text" id="formname" value="" name="name" class="form-control" placeholder="Name" required="required" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="far fa-user"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="input-group">
                            <input type="email" id="formemail" value="" name="email" class="form-control" placeholder="Email" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="input-group">
                            <input type="text" class="form-control" value="" id="formmobile" name="mobile" placeholder="Mobile" required="required" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="input-group date" id="date" data-target-input="nearest">
                            <input type="text" name="dates" value="" id="formdates" class="form-control datetimepicker-input" placeholder="Date" data-target="#date" data-toggle="datetimepicker"/>
                            <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="input-group time" id="time" data-target-input="nearest">
                            <input type="text" id="formtimes" value="" name="times" class="form-control datetimepicker-input" placeholder="Time" data-target="#time" data-toggle="datetimepicker"/>
                            <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="input-group">
                            <select id="formguest" name="guest" class="custom-select form-control">
                                <option selected>Guest</option>
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guest</option>
                                <option value="3">3 Guest</option>
                                <option value="4">4 Guest</option>
                                <option value="5">5 Guest</option>
                                <option value="6">6 Guest</option>
                                <option value="7">7 Guest</option>
                                <option value="8">8 Guest</option>
                                <option value="9">9 Guest</option>
                                <option value="10">10 Guest</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="phones" id="phones" value="{{ $setting->phone }}">
                    <div>
                        <button class="btn custom-btn" type="submit">Book Now</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->


<!-- Menu Start -->
{{-- <div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <p>Food Menu</p>
            <h2>Delicious Food Menu</h2>
        </div>
        <div class="menu-tab">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#burgers">Burgers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#snacks">Snacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#beverages">Beverages</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="burgers" class="container tab-pane active">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Mini cheese Burger</span> <strong>$9.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Double size burger</span> <strong>$11.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Bacon, EGG and Cheese</span> <strong>$13.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Pulled porx Burger</span> <strong>$18.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Fried chicken Burger</span> <strong>$22.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-burger-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div id="snacks" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Corn Tikki - Spicy fried Aloo</span> <strong>$15.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Bread besan Toast</span> <strong>$35.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Healthy soya nugget snacks</span> <strong>$20.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Tandoori Soya Chunks</span> <strong>$30.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-snack-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div id="beverages" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Single Cup Brew</span> <strong>$7.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Caffe Americano</span> <strong>$9.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Caramel Macchiato</span> <strong>$15.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Standard black coffee</span> <strong>$8.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Standard black coffee</span> <strong>$12.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-beverage-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Menu End -->

@endsection

@section('script')
    <script>
      $('#booking').submit(function() {
        var formEl = document.forms.booking;
        var formData = new FormData(formEl);
        name = formData.get('name');
        email = formData.get('email');
        mobile = formData.get('mobile');
        phone = formData.get('phones');
        phone = phone.replace("+", "");
        date = formData.get('dates');
        time = formData.get('times');
        guest = formData.get('guest');

        window.open('https://wa.me/'+phone+'?text=Name:%20'+name+'%0AEmail:%20'+email+'%0AMobile:%20'+mobile+'%0ADate:%20'+date+'%0ATime:%20'+time+'%0AGuest:%20'+guest, '_blank')

        // window.location.href = 'https://wa.me/8801980265838?text=Name:%20'+name+'%0AEmail:%20'+email+'%0AMobile:%20'+mobile+'%0ADate:%20'+date+'%0ATime:%20'+time+'%0AGuest:%20'+guest;

        return false;
    });
    </script>
@endsection
