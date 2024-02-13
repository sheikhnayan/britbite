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

        @yield('header')
    </head>

    <body>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="https://britbite.com" class="navbar-brand">
                    <img src="{{ asset('logo.png') }}" width="252px">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
                                    <p><i class="fa fa-map-marker-alt"></i>BritBite Limited, Lock Studio, 7 Corsicen sq, E3 3YD</p>
                                    <p><i class="fa fa-phone-alt"></i>02080576330</p>
                                    <p><i class="fa fa-envelope"></i>Support@BritBite.com</p>
                                    <div class="footer-social">
                                        <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-youtube"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="#">BritBite</a>, All Right Reserved.</p>
                    <p>Designed By <a href="https://britbite.com">BritBite</a></p>
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

