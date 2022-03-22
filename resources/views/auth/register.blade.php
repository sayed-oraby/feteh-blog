<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style.css') }}" />

</head>

<body>

    <div class="wrapper">

        <!-- preloader -->

        <div id="pre-loader">
            <img src="{{ asset('assets/dashboard/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!-- preloader -->

        <!-- login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url(images/login-bg.jpg);">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4 offset-lg-1 col-md-6 login-fancy-bg bg parallax"
                        style="background-image: url(images/register-inner-bg.jpg);">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">Hello world!</h2>
                            <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                                responsive template along with powerful features.</p>
                            <ul class="list-unstyled pos-bot pb-30">
                                <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                                <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-30 clearfix">
                            <h3 class="mb-20">Signup</h3>
                            <form action="{{ route('register') }}" method="post">
                                @csrf

                                <div class="section-field mb-10">
                                    <label class="mb-10" for="lname">{{ __('Name') }}<span> * </span></label>
                                    <input id="name" class="web form-control @error('name') is-invalid @enderror" type="text" placeholder="Name"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="section-field mb-10">
                                    <label class="mb-10" for="email">{{ __('Email') }}<span> * </span></label>
                                    <input type="email" placeholder="Email*" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="section-field mb-10">
                                    <label class="mb-10" for="password">{{ __('Password') }}<span> * </span></label>
                                    <input class="Password form-control @error('password') is-invalid @enderror" id="password" type="password"
                                        placeholder="Password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="section-field mb-10">
                                    <label class="mb-10" for="password">{{ __('Confirm Password') }}<span> * </span></label>
                                    <input class="Password form-control @error('password_confirmation') is-invalid @enderror" id="password" type="password"
                                        placeholder="Password" name="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" href="#" class="button">
                                    <span>Signup</span>
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                            <p class="mt-20 mb-0">
                                <span>Don you have an account?</span>
                                <a href="{{ route('login') }}">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- login-->

    </div>



    <!-- jquery -->

    <!-- jquery -->
    <script src="{{ asset('assets/dashboard/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset('assets/dashboard/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = '{{ asset('assets/dash') }}board/js/';
    </script>

    <!-- chart -->
    <script src="{{ asset('assets/dashboard/js/chart-init.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset('assets/dashboard/js/calendar.init.js') }}"></script>

    <!-- charts sparkline -->
    <script src="{{ asset('assets/dashboard/js/sparkline.init.js') }}"></script>

    <!-- charts morris -->
    <script src="{{ asset('assets/dashboard/js/morris.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('assets/dashboard/js/datepicker.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="{{ asset('assets/dashboard/js/sweetalert2.js') }}"></script>

    <!-- toastr -->
    <script src="{{ asset('assets/dashboard/js/toastr.js') }}"></script>

    <!-- validation -->
    <script src="{{ asset('assets/dashboard/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset('assets/dashboard/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>

</body>

</html>
