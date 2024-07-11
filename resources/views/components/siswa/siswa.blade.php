<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="siswa"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Profil Siswa"></x-navbars.navs.auth>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Profil Siswa - {{ $siswa->nama }}</h4>
                            </div>
                        </div>
                        <div class="container mt-4 mb-5">
                            <div class="row d-flex justify-content-between mt-2">

                                <div class="card col-md-4 text-center border-success shadow-lg p-3 bg-body rounded" style="max-width: 26rem;">

                                    <div class="px-3 pt-3">
                                        @if($siswa->gender->jenis == 'Laki laki')
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


                                    <h4>{{ $siswa->nama }}</h4>
                                    <p class="fs-6 fw-normal mt-n1">{{ $siswa->jurusan->nama }}</p>
                                    <p class="fs-6 fw-normal mt-n3">Kelas {{ $siswa->kelas->nama }}</p>

                                    <hr class="flex-grow-3 border-white opacity-5 mt-2 mb-2">

                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">Jumlah Pelanggaran :</p><p class="badge bg-gradient-danger">{{ $totalPelanggaran }}</pc>
                                    </div>

                                    <hr class="flex-grow-3 border-white opacity-5 mt-n2 mb-2">

                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">Total Poin Pelanggaran : </p><p class="badge bg-gradient-danger">{{ $totalPoin }}</p>
                                    </div>

                                    <hr class="flex-grow-3 border-white opacity-5 mt-n2 mb-3">

                                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn bg-gradient-warning mb-2">Edit Siswa</a>

                                    <a href="{{ route('buku-pelanggaran.create', ['siswa_id' => $siswa->id]) }}" class="btn bg-gradient-danger mb-2">Tambah Pelanggaran</a>
                                </div>
                                <!-- Navigation Tabs -->
                                <div class="card col-md-8 shadow-lg p-3 bg-body rounded">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active fs-6 fw-bold link-dark" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab" aria-controls="biodata" aria-selected="true">Biodata</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link fs-6 fw-bold link-dark" id="pelanggaran-tab" data-bs-toggle="tab" data-bs-target="#pelanggaran" type="button" role="tab" aria-controls="pelanggaran" aria-selected="false">Pelanggaran</button>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                            <button class="nav-link fs-6 fw-bold link-dark" id="sanksi-tab" data-bs-toggle="tab" data-bs-target="#sanksi" type="button" role="tab" aria-controls="sanksi" aria-selected="false">Sanksi</button>
                                        </li> --}}
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <!-- Biodata Content -->
                                        <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
                                            <table class="table table-striped mt-3">
                                                <tr class="align-middle" height="56px">
                                                    <th>NIS</th>
                                                    <td>{{ $siswa->nis }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>NISN</th>
                                                    <td>{{ $siswa->nisn }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Gender</th>
                                                    <td>{{ $siswa->gender->jenis }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Agama</th>
                                                    <td>{{ $siswa->agama->nama }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Tempat, Tanggal Lahir</th>
                                                    <td>{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Alamat</th>
                                                    <td>{{ $siswa->alamat }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Nama Ayah</th>
                                                    <td>{{ $siswa->nama_ayah }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Nama Ibu</th>
                                                    <td>{{ $siswa->nama_ibu }}</td>
                                                </tr>
                                                <tr class="align-middle" height="56px">
                                                    <th>Telepon</th>
                                                    <td>{{ $siswa->telepon }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- Pelanggaran Content -->
                                        <div class="tab-pane fade" id="pelanggaran" role="tabpanel" aria-labelledby="pelanggaran-tab">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Pelanggaran</th>
                                                        {{-- <th width="50px">Tipe Pelanggaran</th> --}}
                                                        <th class="text-center" width="24px">Poin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($siswa->bukuPelanggarans as $pelanggaran)
                                                        <tr>
                                                            <td>{{ $pelanggaran->pivot->formatted_tanggal }}</td>

                                                            <td class="ps-4">{{ $pelanggaran->pivot->pelanggaran->deskripsi}}</td>

                                                            {{-- <td class="ps-4">{{ $pelanggaran->pivot->tipePelanggaran->nama}}</td> --}}

                                                            <td class="text-center">{{ $pelanggaran->pivot->poin }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <!-- Sanksi Content -->
                                        <div class="tab-pane fade" id="sanksi" role="tabpanel" aria-labelledby="sanksi-tab">
                                            <p>Content for Sanksi</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layout>
