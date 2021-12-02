<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Express Coursier | @yield('page-title')</title>

    <link rel="icon" href="{{ asset('assets/showcase/img/core-img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/showcase/style.css') }}">

    @yield('header-script')
</head>

<body>

    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <div class="top-search-area">

        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>

                        <form action="https://preview.colorlib.com/theme/uza/index.html" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('showcase.components.header')

    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">@yield('content-title')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-bg-curve">
            <img src="{{ asset('assets/showcase/img/core-img/curve-5.png') }}" alt="">
        </div>
    </div>

    @yield('page-content')

    {{-- @include('showcase.components.newsletter') --}}

    @include('showcase.components.footer')

    <script src="{{ asset('assets/showcase/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/showcase/js/popper.min.js%2bbootstrap.min.js.pagespeed.jc.Wtqfk6fI6e.js') }}"></script>

    <script>
        eval(mod_pagespeed_TH0OHMZlob);
    </script>
    <script>
        eval(mod_pagespeed_zavuQyd9rx);
    </script>

    <script src="{{ asset('assets/showcase/js/uza.bundle.js') }}"></script>

    <script src="{{ asset('assets/showcase/js/default-assets/active.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="{{ asset('assets/showcase/js/beacon.min.js') }}" data-cf-beacon='{"rayId":"6a8ed1db85400857","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.10.0","si":100}'></script>
    <script defer src="{{ asset('assets/showcase/js/beacon.min.js') }}" data-cf-beacon='{"rayId":"6a8ed1db7f0d0857","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.10.0","si":100}'></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/customs/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/customs/js/jquery-validation/additional-methods.min.js') }}"></script>
    @yield('script')
</body>

</html>
