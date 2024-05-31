<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="guru"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Profil Guru"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Profil Guru - {{ $guru->nama }}</h4>
                            </div>
                        </div>
                        <div class="container mt-4 mb-4">
                            <div class="row d-flex justify-content-between mt-2">
                                <!-- Profile Illustration and Details -->
                                <div class="card col-md-4 text-center border-success shadow-lg p-3 mb-3 bg-body rounded" style="max-width: 26rem;">

                                    <div class="px-3 pt-3">
                                        <!-- Ganti gambar sesuai dengan jenis kelamin -->
                                        @if($guru->gender->jenis == 'Laki laki')
                                            <img src="{{ asset('assets/img/boy.jpg') }}"
                                                alt="Profile Image"
                                                class="w-75 img-fluid rounded-circle mb-3"
                                                style="border: 5px solid #28862b; padding:5px; background-color: rgba(255, 255, 255, 0);">
                                        @else
                                            <img src="{{ asset('assets/img/girl.jpg') }}"
                                                alt="Profile Image"
                                                class="w-75 img-fluid rounded-circle mb-3"
                                                style="border: 5px solid #28862b; padding:5px; background-color: rgba(255, 255, 255, 0);">
                                        @endif
                                    </div>


                                    <h4>{{ $guru->nama }}</h4>
                                    <p class="fs-6 fw-normal mt-n1">{{ $guru->posisi }}</p>
                                    <!-- Tampilkan gender guru -->
                                    <p class="fs-6 fw-normal mt-n3">Gender {{ $guru->gender->jenis }}</p>

                                    <hr class="flex-grow-3 border-white opacity-5 mt-2 mb-2">

                                    <!-- Tampilkan jumlah pelanggaran yang dilaporkan -->
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">Pelanggaran yang dilaporkan :</p><p class="badge bg-gradient-success">{{ $totalPelanggaran }}</pc>
                                    </div>

                                    <hr class="flex-grow-3 border-white opacity-5 mt-n2 mb-3">

                                    <!-- Tombol Edit Guru -->
                                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn bg-gradient-warning mb-2">Edit Guru</a>
                                </div>
                                <!-- Navigation Tabs (Jika Diperlukan) -->
                                <div class="card col-md-8 shadow-lg p-3 mb-3 bg-body rounded">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active fs-6 fw-bold link-dark" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab" aria-controls="biodata" aria-selected="true">Biodata</button>
                                        </li>
                                    </ul>

                                    <!-- Konten Biodata Guru -->
                                    <table class="table table-striped mt-3">
                                        <tr class="align-middle" height="56px">
                                            <th>Nama</th>
                                            <td>{{ $guru->nama }}</td>
                                        </tr>
                                        <tr class="align-middle" height="56px">
                                            <th>Posisi</th>
                                            <td>{{ $guru->posisi }}</td>
                                        </tr>
                                        <tr class="align-middle" height="56px">
                                            <th>Gender</th>
                                            <td>{{ $guru->gender->jenis }}</td>
                                        </tr>
                                        <tr class="align-middle" height="56px">
                                            <th>Agama</th>
                                            <td>{{ $guru->agama->nama }}</td>
                                        </tr>
                                        <tr class="align-middle" height="56px">
                                            <th>Telepon</th>
                                            <td>{{ $guru->telepon }}</td>
                                        </tr>
                                            <tr class="align-middle" height="56px">
                                            <th>Email</th>
                                            <td>{{ $guru->email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layout>
