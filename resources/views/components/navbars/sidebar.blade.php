@props(['activePage'])

@php
$user = auth()->user();
@endphp

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
             {{-- <img src="{{ asset('assets') }}/img/smk1.png" class="navbar-brand-img mb-3 me-2" alt="main_logo"> --}}
            <div class="mt-n2 ms-n2">
                <h5 class="fs-4 font-weight-bold text-white">SIPPS</h5>
                <h6 class="fs-6 mt-n3 font-weight-normal text-white">SMKN 1 Tambang</h6>
            </div>
        </a>
    </div>

    <hr class="horizontal light opacity-6 mt-0 mb-2">
        <ul class="navbar-nav">

            @haspermission('mengakses halaman profile user')
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center {{ $activePage == 'user-profile' ? 'active bg-gradient-success' : '' }}" href="{{ route('user-profile') }}">
                    <i class="material-icons opacity-10 pb-1 ms-n2" style="font-size: 1.8rem; margin-right: 10px;">account_circle</i>
                    <span class="nav-link-text" style="word-wrap: break-word; white-space: normal;">{{ $user->name }}</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman profile siswa')
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center {{ $activePage == 'profile-siswa' ? 'active bg-gradient-success' : '' }}" href="{{ route('siswa.profile') }}">
                    <i class="material-icons opacity-10 pb-1 ms-n2" style="font-size: 1.8rem; margin-right: 10px;">account_circle</i>
                    <span class="nav-link-text" style="word-wrap: break-word; white-space: normal;">{{ $user->name }}</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman profile guru')
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center {{ $activePage == 'profile-guru' ? 'active bg-gradient-success' : '' }}" href="{{ route('guru.profile') }}">
                    <i class="material-icons opacity-10 pb-1 ms-n2" style="font-size: 1.8rem; margin-right: 10px;">account_circle</i>
                    <span class="nav-link-text" style="word-wrap: break-word; white-space: normal;">{{ $user->name }}</span>
                </a>
            </li>
            @endhaspermission
                <hr class="flex-grow-1 border-white opacity-8 ms-3 me-3 mt-2 mb-2">

            @role('admin')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'users' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('users.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">manage_accounts</i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            @endrole

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">equalizer</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @haspermission('mengakses halaman siswa')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'siswa' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('siswa.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Siswa</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman guru')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'guru' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('guru.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">local_library</i>
                    </div>
                    <span class="nav-link-text ms-1">Guru</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman kelas')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'kelas' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('kelas.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelas</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman jurusan')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'jurusan' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('jurusan.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Jurusan</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman pelanggaran')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'pelanggaran' ? ' active bg-gradient-danger' : '' }} "
                    href="{{ route('pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">book</i>
                    </div>
                    <span class="nav-link-text ms-1">Tata Tertib</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman lapor pelanggaran')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'lapor-pelanggaran' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('lapor-pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">menu_book</i>
                    </div>
                    <span class="nav-link-text ms-1">Lapor Pelanggaran</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman laporan pelanggaran')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'laporan-pelanggaran-kelas' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('laporan-pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">menu_book</i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan Pelanggaran</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman buku pelanggaran kelas')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'buku-pelanggaran-kelas' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('buku-pelanggaran-kelas.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">menu_book</i>
                    </div>
                    <span class="nav-link-text ms-1">Buku Pelanggaran Kelas</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman buku pelanggaran')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'buku-pelanggaran' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('buku-pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">menu_book</i>
                    </div>
                    <span class="nav-link-text ms-1">Buku Pelanggaran</span>
                </a>
            </li>
            @endhaspermission

            @haspermission('mengakses halaman lapor keterlambatan')
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'lapor-keterlambatan' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('lapor-keterlambatan.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">assignment_late</i>
                    </div>
                    <span class="nav-link-text ms-1">Catat Keterlambatan</span>
                </a>
            </li>
            @endhaspermission

        </ul>
    </div>
</aside>
