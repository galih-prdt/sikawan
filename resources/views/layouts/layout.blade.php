<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>SPegawai</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Template/img/favicon.jpg') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        <div class="header">
            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="{{ asset('Template/img/logo.png') }}" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="{{ asset('Template/img/logo-small.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);"></a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ asset('Template/img/profiles/PP.png') }}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="{{ asset('Template/img/profiles/PP.png') }}" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>John Doe</h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('Template/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout
                            </a>
                            <form id="logout-form" action="#" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">Logout
                    </a>
                    <form id="logout-form-mobile" action="#" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="{{ strpos(Route::currentRouteName(), 'pegawai') !== false ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{ route('pegawai.index') }}"><i data-feather="user"></i><span> Master Pegawai</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        <script src="{{ asset('Template/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('Template/js/feather.min.js') }}"></script>
        <script src="{{ asset('Template/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('Template/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('Template/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('Template/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('Template/js/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}"
                });
            </script>
        @endif
    </div>
</body>
</html>
