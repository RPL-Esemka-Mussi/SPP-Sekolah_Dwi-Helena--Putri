<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP Sekolah</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><b>SPP Sekolah</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == '/' ? 'active' : 'home' }}" aria-current="page"
                            href="{{ url('/home') }}">Home</a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'user' ? 'active' : '' }}"
                                href="{{ url('/user') }}">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'siswa' ? 'active' : '' }}"
                                href="{{ url('/siswa') }}">siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'kelas' ? 'active' : '' }}"
                                href="{{ url('/kelas') }}">kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'spp' ? 'active' : '' }}"
                                href="{{ url('/spp') }}">SPP</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'pembyaran' ? 'active' : '' }}"
                            href="{{ url('/pembayaran') }}">Pembayaran</a>
                    </li>
                </ul>
                <ul class="nav-item dropdown my-auto ms-auto">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <li class="dropdown-menu ms-auto">
                        <a class="text-center btn  nav-link {{ Request::segment(1) == 'logout' ? 'active' : '' }}"
                            href="{{ url('/logout') }}"><b>logout</b><i class="bi bi-box-arrow-right mx-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
