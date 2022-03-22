<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/website/images/favicon.png') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/chosen.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/jquery.scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/lightbox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/magnific-popup.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/fonts/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/megamenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/dreaming-attribute.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/style.css') }}" />
    <title>Kaycee - HTML Template </title>

    <style>
        .pagination{
            display: flex !important;
        }
    </style>

    @yield('head')
</head>

<body>

    @include('website.layouts.partials.navbare')

    @include('website.layouts.partials.banner')

    <div class="main-container right-sidebar has-sidebar">
        <!-- POST LAYOUT -->
        <div class="container">
            <div class="row">
                <div class="main-content col-xl-9 col-lg-8 col-md-12 col-sm-12">

                    @yield('articale')

                </div>

                @include('website.layouts.partials.sidebare')
            </div>
        </div>
    </div>

    <footer id="footer" class="footer style-01">
        <div class="section-010">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© Copyright 2020 <a href="#">Kaycee</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="kaycee-socials style-01">
                            <div class="content-socials">
                                <ul class="socials-list">
                                    <li>
                                        <a href="https://facebook.com" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com" target="_blank">
                                            <i class="fa fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-device-mobile">
        <div class="wapper">
            <div class="footer-device-mobile-item device-home">
                <a href="index.html">
                    <span class="icon">
                        <span class="pe-7s-home"></span>
                    </span>
                    Home
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-wishlist">
                <a href="wishlist.html">
                    <span class="icon">
                        <span class="pe-7s-like"></span>
                    </span>
                    Wishlist
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-cart">
                <a href="cart.html">
                    <span class="icon">
                        <span class="flaticon-shopping-bag-1"></span>
                        <span class="count-icon">
                            0
                        </span>
                    </span>
                    <span class="text">Cart</span>
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-user">
                <a href="my-account.html">
                    <span class="icon">
                        <span class="flaticon-profile"></span>
                    </span>
                    Account
                </a>
            </div>
        </div>
    </div>

    <a href="#" class="backtotop active">
        <i class="flaticon-right-arrow"></i>
    </a>

    <script src="{{ asset('assets/website/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/chosen.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/slick.js') }}"></script>
    <script src="{{ asset('assets/website/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/threesixty.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/website/js/functions.js') }}"></script>

    @yield('script')
</body>

</html>
