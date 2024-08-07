@props(['activePage'])

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
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center {{ $activePage == 'user-profile' ? 'active bg-gradient-success' : '' }}" href="{{ route('user-profile') }}">
                    <i class="material-icons opacity-10 pb-1" style="font-size: 1.8rem; margin-right: 8px;">account_circle</i>
                    <span class="nav-link-text">User Profile</span>
                </a>
            </li>

                <hr class="flex-grow-1 border-white opacity-8 ms-3 me-3 mt-2 mb-2">

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'siswa' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('siswa.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Siswa</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'guru' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('guru.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">local_library</i>
                    </div>
                    <span class="nav-link-text ms-1">Guru</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'kelas' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('kelas.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Kelas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'jurusan' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('jurusan.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Jurusan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'pelanggaran' ? ' active bg-gradient-danger' : '' }} "
                    href="{{ route('pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">book</i>
                    </div>
                    <span class="nav-link-text ms-1">Tata Tertib</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'tipe-pelanggaran' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('tipe-pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Tipe Pelanggaran</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'sanksi-pelanggaran' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('sanksi-pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Sanksi Pelanggaran</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'buku-pelanggaran' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('buku-pelanggaran.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">menu_book</i>
                    </div>
                    <span class="nav-link-text ms-1">Buku Pelanggaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'lapor-keterlambatan' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('lapor-keterlambatan.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">assignment_late</i>
                    </div>
                    <span class="nav-link-text ms-1">Lapor Keterlambatan</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'billing' ? ' active bg-gradient-success' : '' }}  "
                    href="{{ route('billing') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'notifications' ? ' active bg-gradient-success' : '' }}  "
                    href="{{ route('notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'profile' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}

        </ul>
    </div>
</aside>
