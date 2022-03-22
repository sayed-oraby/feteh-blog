<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/dashboard/images/favicon.ico') }}" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    @if (App::getLocale() == 'ar' and !Session::get('isDark'))
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style-rtl.css') }}" />
    @elseif (App::getLocale() == 'ar' and Session::get('isDark'))
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style-rtl-dark.css') }}" />
    @elseif (App::getLocale() != 'ar' and Session::get('isDark'))
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style-dark.css') }}" />
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style.css') }}" />
    @endif

    <style>
        .admin-header .top-nav {
            margin-top: 6px;
        }

    </style>

    @yield('header')

</head>

<body id="body">

    <div class="wrapper">

        <!-- preloader -->

        <div id="pre-loader">
            <img src="{{ asset('assets/dashboard/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!-- header -->
        @include('dashboard.layouts.partials.navbare')

        <!-- Main content -->

        <div class="container-fluid">
            <div class="row">

                <!-- SideBare -->
                @include('dashboard.layouts.partials.sidebare')

                <!-- Main content -->

                <!-- wrapper -->

                <div class="content-wrapper">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="mb-0">@yield('page_title')</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                    @yield('breadcrumb')
                                </ol>
                            </div>
                        </div>
                    </div>

                    {{-- @include('dashboard.layouts.partials.messages') --}}

                    <!-- main body -->

                    @yield('content')

                    <!-- wrapper -->

                    <!-- footer -->

                    <footer class="footer-dark p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-md-left">
                                    <p class="mb-0"> &copy; Copyright <span id="copyright">
                                            <script>
                                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                            </script>
                                        </span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="text-center text-md-right">
                                    <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                    <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                    <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->



    <!-- jquery -->

    <!-- jquery -->
    <script src="{{ asset('assets/dashboard/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset('assets/dashboard/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = "{{ asset('assets/dashboard/js/') }}/";
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

    <!-- validation -->
    <script src="{{ asset('assets/dashboard/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset('assets/dashboard/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>

    <script>
        const Id = "{{ Auth::id() }}";
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>

        // const Id = "{{ Auth::id() }}";

        $(document).ready(function() {

            $("#button-toggle").click(function(e){
                $(".sidebare-avatar").toggleClass('d-none');
            });

            @if (Session::get('success', false) || Session::get('error', false))
                <?php $data = Session::has('success') ? Session::get('success') : Session::get('error'); ?>

                Command: toastr["{{ Session::has('success') ? 'success' : 'error' }}"]("{{ $data }}!");

                // toastr.options = {
                //     "closeButton": false,
                //     "debug": false,
                //     "newestOnTop": false,
                //     "progressBar": true,
                //     "positionClass": "toast-top-left",
                //     "preventDuplicates": false,
                //     "onclick": null,
                //     "showDuration": 500,
                //     "hideDuration": 1000,
                //     "timeOut": 5000,
                //     "extendedTimeOut": 1000,
                //     "showEasing": "swing",
                //     "hideEasing": "linear",
                //     "showMethod": "fadeIn",
                //     "hideMethod": "fadeOut"
                // };
            @endif
        });
    </script>

    @yield('script')

</body>

</html>
