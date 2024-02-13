@extends('front.layouts.main')

@section('content')
    @php
        $setting = DB::table('settings')->where('slug',$slug)->first();
    @endphp

        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    @foreach ($banner as $item)
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="{{ asset($item->banner) }}" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>{{ $item->title }}</h1>
                            <p>
                                {{ $item->sub_title }}
                            </p>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="{{ route('menu',[$slug]) }}">View Menu</a>
                                <a class="btn custom-btn" href="{{ route('booking',[$slug]) }}">Book Table</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Carousel End -->


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


        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset($setting->logo) }}" alt="Image">
                            <button type="button" class="btn-play" data-toggle="modal" data-src="{{ $setting->video }}" data-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header">
                                <p>About Us</p>
                                {{-- <h2>Cooking Since 1990</h2> --}}
                            </div>
                            <div class="about-text">
                                <p>
                                {{ $setting->content }}
                                </p>
                                <a class="btn custom-btn" href="{{ route('booking',[$slug]) }}">Book A Table</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Video Modal Start-->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Modal End -->


        <!-- Feature Start -->
        <div class="feature">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-header">
                            <p>Why Choose Us</p>
                            <h2>Our Key Features</h2>
                        </div>
                        <div class="feature-text">
                            <div class="feature-img">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ asset('front/img/feature-1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="{{ asset('front/img/feature-2.jpg') }}" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="{{ asset('front/img/feature-3.jpg') }}" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="{{ asset('front/img/feature-4.jpg') }}" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consec adipis elit. Phasel nec preti mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor, auctor id gravida condime, viverra quis sem. Curabit non nisl nec nisi sceleri maximus
                            </p>
                            <a class="btn custom-btn" href="{{ route('booking',[$slug]) }}">Book A Table</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-cooking"></i>
                                    <h3>World’s best Chef</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-vegetable"></i>
                                    <h3>Natural ingredients</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-medal"></i>
                                    <h3>Best quality products</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-meat"></i>
                                    <h3>Fresh vegetables & Meet</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-courier"></i>
                                    <h3>Fastest door delivery</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-fruits-and-vegetables"></i>
                                    <h3>Ground beef & Low fat</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->


        <!-- Food Start -->
        <div class="food">
            <div class="container">
                <div class="row align-items-center">
                    @foreach ($food_category as $item)

                    <div class="col-md-4">
                        <div class="food-item">
                            <i class="flaticon-burger"></i>
                            <h2>{{ $item->name }}</h2>
                            <p>
                                {{ $item->description }}
                            </p>
                            <a href="{{ route('menu',[$slug]) }}#sec-{{ $item->id }}">View Menu</a>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        <!-- Food End -->


        <!-- Menu Start -->
        {{-- <div class="menu">
            <div class="container">
                <div class="section-header text-center">
                    <p>Food Menu</p>
                    <h2>Delicious Food Menu</h2>
                </div>
                <div class="menu-tab">
                    <ul class="nav nav-pills justify-content-center">
                        @foreach ($food_category as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active':''}}" data-toggle="pill" href="#burgers{{ $item->id }}">{{ $item->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($food_category as $key =>$item)

                        <div id="burgers{{ $item->id }}" class="container tab-pane {{ $key == 0 ? 'active':''}}">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    @foreach ($item->menu as $food)

                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="{{ asset($food->image) }}" alt="Image">
                                        </div>
                                        <div class="menu-text">
                                            <h3><span>{{ $food->name }}</span> <strong>${{ $food->price }}</strong></h3>
                                            <p>{{ $food->description }}</p>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="col-lg-5 d-none d-lg-block">
                                    <img src="{{ asset($item->image) }}" alt="Image">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Menu End -->


        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Team</p>
                    <h2>Our Master Chef</h2>
                </div>
                <div class="row">
                    @foreach ($team as $item)

                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset($item->image) }}" alt="Image">
                                <div class="team-social">
                                    <a target="_blank" href="{{ $item->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a target="_blank" href="{{ $item->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="{{ $item->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="{{ $item->instagram }}"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-text">
                                <h2>{{ $item->name }}</h2>
                                <p>{{ $item->position }}</p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/img/testimonial-1.jpg') }}" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/img/testimonial-2.jpg') }}" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/img/testimonial-3.jpg') }}" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/img/testimonial-4.jpg') }}" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Contact Us</p>
                    <h2>Contact For Any Query</h2>
                </div>
                <div class="row align-items-center contact-information">
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Address</h3>
                                <p>{{ $setting->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Call Us</h3>
                                <p>{{ $setting->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Email Us</h3>
                                <p>{{ $setting->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-share"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Follow Us</h3>
                                <div class="contact-social">
                                    <a target="_blank" href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a target="_blank" href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>
                                    <a target="_blank" href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a target="_blank" href="{{ $setting->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row contact-form">
                    <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1600663868074!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Food Blog</p>
                    <h2>Latest From Food Blog</h2>
                </div>
                @php
                    $user_id = DB::table('settings')->where('slug',$slug)->first();
                    $blog = DB::table('blogs')->where('user_id',$user_id->user_id)->latest()->limit(2)->get();
                @endphp
                <div class="row">
                  @foreach ($blog as $item)
                  <div class="col-md-6">
                      <div class="blog-item">
                          <div class="blog-img">
                              <img src="{{ asset($item->image) }}" alt="Blog">
                          </div>
                          <div class="blog-content">
                              <h2 class="blog-title">{{ $item->title }}</h2>
                              <div class="blog-meta">
                                  {{-- <p><i class="far fa-user"></i>Admin</p>
                                  <p><i class="far fa-list-alt"></i>Food</p> --}}
                                  <p><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</p>
                                  {{-- <p><i class="far fa-comments"></i>10</p> --}}
                              </div>
                              <div class="blog-text">
                                  <p>
                                    {!! \Illuminate\Support\Str::limit($item->content, 200, '...') !!}
                                  </p>
                                  <a class="btn custom-btn" href="{{ route('single',[$slug,$item->id]) }}">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
        <!-- Blog End -->


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
