@props(['activePage'])
{{-- <div class="nav-wrapper position-relative my-4">
    <ul class="nav nav-pills nav-fill" role="tablist">
        <li class="nav-item px-4">
            <a class="nav-link mb-0 px-0 py-1 {{ request()->is('tipe-pelanggaran*') ? 'active' : '' }}" href="{{ route('tipe-pelanggaran.index') }}">
                <i class="material-icons text-lg position-relative">email</i>
                <span class="ms-1">Tipe Pelanggaran</span>
            </a>
        </li>
        <li class="nav-item px-4">
            <a class="nav-link mb-0 px-0 py-1 {{ request()->is('pelanggaran*') ? 'active' : '' }}" href="{{ route('pelanggaran.index') }}">
                <i class="material-icons text-lg position-relative">home</i>
                <span class="ms-1">List Pelanggaran</span>
            </a>
        </li>
        <li class="nav-item px-4">
            <a class="nav-link mb-0 px-0 py-1 {{ request()->is('sanksi-pelanggaran*') ? 'active' : '' }}" href="{{ route('sanksi-pelanggaran.index') }}">
                <i class="material-icons text-lg position-relative">settings</i>
                <span class="ms-1">Sanksi Pelanggaran</span>
            </a>
        </li>
    </ul>
</div> --}}



<div class="nav-wrapper position-relative my-4">
    <ul class="nav">
        <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-0 px-4 py-1 {{ $activePage == 'pelanggaran' ? 'active bg-danger text-white' : '' }}" href="{{ route('pelanggaran.index') }}">
                    <i class="material-icons text-lg position-relative">menu</i>
                    <span class="ms-1">List Pelanggaran</span>
                </a>
            </li>
        </ul>

        <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-0 px-4 py-1 {{ $activePage == 'tipe-pelanggaran' ? 'active bg-danger text-white' : '' }}" href="{{ route('tipe-pelanggaran.index') }}">
                    <i class="material-icons text-lg position-relative">segment</i>
                    <span class="ms-1">Tipe Pelanggaran</span>
                </a>
            </li>
        </ul>

        <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-0 px-4 py-1 {{ $activePage == 'sanksi-pelanggaran' ? 'active bg-danger text-white' : '' }}" href="{{ route('sanksi-pelanggaran.index') }}">
                    <i class="material-icons text-lg position-relative">gavel</i>
                    <span class="ms-1">Sanksi Pelanggaran</span>
                </a>
            </li>
        </ul>
    </ul>
</div>
