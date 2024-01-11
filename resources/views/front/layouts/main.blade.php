<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BritBite</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="{{ asset('front/img/favicon.ico') }}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
        <link href="{{ asset('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
        @php
            $setting = DB::table('settings')->first();
        @endphp

        @yield('header')
    </head>

    <body>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <img src="{{ asset($setting->logo) }}" width="252px">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('feature') }}" class="nav-item nav-link">Feature</a>
                        <a href="{{ route('team') }}" class="nav-item nav-link">Chef</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ route('booking') }}" class="nav-item nav-link">Booking</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('blog') }}" class="dropdown-item">Blog Grid</a>
                                <a href="{{ route('single') }}" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div> --}}
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->

        @yield('content')


        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Our Address</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>{{ $setting->address }}</p>
                                    <p><i class="fa fa-phone-alt"></i>{{ $setting->phone }}</p>
                                    <p><i class="fa fa-envelope"></i>{{ $setting->email }}</p>
                                    <div class="footer-social">
                                        <a target="_blank" href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>
                                        <a target="_blank" href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="{{ $setting->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Quick Links</h2>
                                    @php
                                        $pages = DB::table('pages')->get();
                                    @endphp
                                    @foreach ($pages as $item)
                                    <a href="{{ route('page',[$item->title]) }}">{{ $item->title }}</a>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn custom-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="#">{{ $setting->name }}</a>, All Right Reserved.</p>
                    <p>Designed By <a href="{{ route('index') }}">BritBite</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('front/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Contact Javascript File -->
        <script src="{{ asset('front/mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ asset('front/mail/contact.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('front/js/main.js') }}"></script>

        @yield('script')
    </body>
</html>

