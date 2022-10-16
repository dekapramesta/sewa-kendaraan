<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href={{ asset('bundles/select2/dist/css/select2.min.css') }}>
    <link rel="stylesheet" href="{{ asset('bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <div class="loader"></div>
    <div id="app">


        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>

                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <a href="{{ route('Logout') }}" class="btn btn-danger">Logout</a>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <h5 class="mt-4"><span class="logo-name">Sistem Sewa Kendaraan</span></h5>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        @if (Auth::user()->level == 1)
                            <li class="dropdown">
                                <a href="{{ route('admin') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Dashboard</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('admin.pemesanan') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Pemesanan</span></a>
                            </li>
                        @elseif(Auth::user()->level == 2)
                            <li class="dropdown">
                                <a href="{{ route('penyetuju') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Persetujuan
                                        Sewa</span></a>
                            </li>
                        @endif


                    </ul>
                </aside>
            </div>
