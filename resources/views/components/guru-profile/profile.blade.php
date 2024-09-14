<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="profile-guru"></x-navbars.sidebar>
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
                                <h4 class="text-white text-capitalize ps-3">Profil Guru</h4>
                            </div>
                        </div>
                        <div class="container mt-4 mb-4">
                            <div class="row d-flex justify-content-between mt-2">
                                <div class="col-md-4">
                                    <div class="card text-center border-success shadow-lg p-3 bg-body rounded h-100 d-flex flex-column">
                                        <div class="px-3 pt-3">
                                            @if ($guru->foto)
                                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                                     alt="Profile Image"
                                                     class="img-fluid rounded-circle mb-3"
                                                     style="border: 4px solid #28862b; padding: 4px; object-fit: cover; width: 240px; height: 240px;">
                                            @else
                                                @if($guru->gender->jenis == 'Laki laki')
                                                    <img src="{{ asset('assets/img/guru_male.jpg') }}"
                                                        alt="Profile Image"
                                                        class="w-75 img-fluid rounded-circle mb-3"
                                                        style="border: 5px solid #28862b; padding:5px; background-color: rgba(255, 255, 255, 0);">
                                                @else
                                                    <img src="{{ asset('assets/img/guru_female.jpg') }}"
                                                        alt="Profile Image"
                                                        class="w-75 img-fluid rounded-circle mb-3"
                                                        style="border: 5px solid #28862b; padding:5px; background-color: rgba(255, 255, 255, 0);">
                                                @endif
                                            @endif
                                        </div>
                                        <h4>{{ $guru->nama }}</h4>
                                        <p class="fs-6 fw-normal">{{ $guru->pangkat_gol_jabatan }}</p>
                                        <hr class="flex-grow-3 border-white opacity-5 mt-1 mb-2">
                                        <!-- Tampilkan jumlah pelanggaran yang dilaporkan -->
                                        <div class="d-flex justify-content-between">
                                            <p class="fs-6 fw-normal">Pelanggaran yang dilaporkan :</p>
                                            <p class="badge bg-gradient-success">{{ $totalPelanggaran }}</p>
                                        </div>
                                        <hr class="flex-grow-3 border-white opacity-5 mt-n2 mb-3">
                                        <div class="mt-auto">
                                            <a href="{{ route('guru.profileedit', $guru->id) }}" class="btn bg-gradient-warning mb-2 w-100">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Navigation Tabs (Jika Diperlukan) -->
                                <div class="col-md-8">
                                    <div class="card shadow-lg p-3 bg-body rounded">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active fs-6 fw-bold link-dark" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab" aria-controls="biodata" aria-selected="true">Biodata</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <!-- Biodata Content -->
                                            <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
                                                <table class="table table-striped mt-3">
                                                    <tr class="align-middle" height="50px">
                                                        <th class="col-4">Nama Lengkap</th>
                                                        <td>{{ $guru->nama }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Gender</th>
                                                        <td>{{ $guru->gender->jenis }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>NIP/NUPTK</th>
                                                        <td>{{ $guru->nip_nuptk }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Pangkat/ Gol. Jabatan</th>
                                                        <td>{{ $guru->pangkat_gol_jabatan }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Tugas Tambahan</th>
                                                        <td>{{ $guru->tugas_tambahan }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Agama</th>
                                                        <td>{{ $guru->agama->nama }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Tempat, Tanggal Lahir</th>
                                                        <td>{{ $guru->tempat_lahir }}, {{ $guru->tanggal_lahir }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Telepon</th>
                                                        <td>{{ $guru->telepon }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Alamat</th>
                                                        <td>{{ $guru->alamat }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layout>
