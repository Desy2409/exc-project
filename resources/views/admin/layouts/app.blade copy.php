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

    <title>@yield('page-title') | Express Coursier</title>

    <link rel="canonical" href="dashboard-default.html" />
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    
    <script src="{{ asset('assets/customs/js/jquery-3.5.1.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('assets/customs/js/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/customs/popper.js/dist/umd/popper.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    {{-- <link rel="stylesheet" href="{{ asset('assets/customs/bootstrap-4.4.1/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    {{-- <script src="{{ asset('assets/customs/bootstrap-4.4.1/bootstrap.min.js') }}"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/admin/css/light.css') }}" rel="stylesheet">
    <link class="js-stylesheet" href="{{ asset('assets/admin/css/light.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/customs/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> --}}
    <script src="{{ asset('assets/customs/summernote/summernote-bs4.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        @include('admin.components.sidebar')
        <div class="main">
            @include('admin.components.header')

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
                                                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Tableau de bord</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="dropdown me-2 d-inline-block">
                                <a class="btn btn-light bg-white shadow-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                    <i class="align-middle mt-n1" data-feather="calendar"></i> Today
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">Settings</h6>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <button class="btn btn-primary shadow-sm">
                                <i class="align-middle" data-feather="filter">&nbsp;</i>
                            </button>
                            <button class="btn btn-primary shadow-sm">
                                <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
                            </button> --}}
                        </div>
                    </div>
                    @yield('page-content')
                </div>
            </main>

            @include('admin.components.footer')
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    
</body>

</html>
