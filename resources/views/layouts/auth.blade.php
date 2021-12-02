<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Express Coursier | @yield('authenticate_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="ArchitectUI HTML Bootstrap 5 Dashboard Template">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="{{ asset('assets/customs/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css') }}">
    <link href="{{ asset('assets/customs/css/base.css') }}" rel="stylesheet">

    <style>
        input[type="checkbox"],
        input[type="checkbox"]+label,
        input[type="radio"],
        input[type="radio"]+label {
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 g-0 row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/customs/img/city.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Perfect Balance</h3>
                                            <p>
                                                ArchitectUI is like a dream. Some think it's too good to be true! Extensive
                                                collection of unified React Boostrap Components and Elements.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/customs/img/citynights.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>
                                                Easily exclude the components you don't require. Lightweight, consistent
                                                Bootstrap based styles across all elements and components
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/customs/img/citydark.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Complex, but lightweight</h3>
                                            <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        @yield('authenticate_content')
                        <div class="text-center text-white opacity-8 mt-3">Copyright © GRH 2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- plugin dependencies -->
    <script type="text/javascript" src="{{ asset('assets/customs/js/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/customs/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- custome.js -->
    <script type="text/javascript" src="{{ asset('assets/customs/js/carousel-slider.js') }}"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('assets/customs/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/customs/js/jquery-validation/additional-methods.min.js') }}"></script>

    @yield('script')
</body>

</html>












{{-- <!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>@yield('page-title') | Express Coursier</title>

    <link rel="canonical" href="pages-sign-in.html" />
    <link rel="shortcut icon" href="{{ asset('asstes/admin/img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <link class="js-stylesheet" href="{{ asset('assets/admin/css/light.css') }}" rel="stylesheet">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                @yield('page-content')
            </div>
        </main>
    </div>

    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

</body> --}}


<!-- Mirrored from appstack.bootlab.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 09:49:29 GMT -->

{{-- </html> --}}
