<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/dashboard-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 09:45:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') | Express Coursier</title>

    <link rel="canonical" href="dashboard-default.html" />
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <script src="{{ asset('assets/customs/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <link href="{{ asset('assets/admin/css/light.css') }}" rel="stylesheet">
    <link class="js-stylesheet" href="{{ asset('assets/admin/css/light.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/customs/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/customs/summernote/summernote-bs4.min.js') }}"></script>

    @yield('header-style')
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    @auth
        <div class="wrapper">
            @auth('admin')
                @include('admin.components.sidebar')
            @endauth
            @auth('client')
                @include('client.components.sidebar')
            @endauth
            <div class="main">
                @auth('admin')
                    @include('admin.components.header')
                @endauth
                @auth('client')
                    @include('client.components.header')
                @endauth
                <main class="content">
                    <div class="container-fluid p-0">
                        <div class="row mb-2 mb-xl-3">
                            <div class="col-auto d-none d-sm-block">
                                <h2 class="title">@yield('content-title')</h2>
                            </div>

                            <div class="col-auto ms-auto text-end mt-n1">
                                <div class="breadcrumb-area">
                                    <div class="container h-100">
                                        <div class="row h-100 align-items-end">
                                            <div class="col-12">
                                                <div class="breadcumb--con">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><i class="fa fa-home"></i> Tableau de bord</a></li>
                                                            {{-- <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li> --}}
                                                            @yield('breadcrumb')
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('page-content')
                    </div>
                </main>
                @auth('admin')
                    @include('admin.components.footer')
                @endauth
                @auth('client')
                    @include('client.components.footer')
                @endauth

            </div>
        </div>

        
        <script src="{{ asset('assets/admin/js/app.js') }}"></script>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

        <!-- jquery-validation -->
        <script src="{{ asset('assets/customs/js/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/customs/js/jquery-validation/additional-methods.min.js') }}"></script>

        {{-- <script src="{{ asset('webpush/js/enable-push.js') }}" defer></script> --}}
        

        @yield('script')
    @endauth
</body>

</html>
