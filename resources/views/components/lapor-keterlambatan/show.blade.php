<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="lapor-keterlambatan"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Detail Lapor Keterlambatan"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Detail Keterlambatan</h4>
                            </div>
                        </div>
                        <div class="container mt-4 mb-5">
                            <div class="row d-flex justify-content-between mt-2">
                                <!-- Detail Laporan -->
                                <div class="col-md-4">
                                    <div class="card text-center border-success shadow-lg p-3 bg-body rounded h-100 d-flex flex-column">
                                        <div class="px-3 pt-3 mt-4 ps-4">
                                            <img src="{{ asset('assets/img/stopwatch.png') }}" alt="Profile Image" class="w-70 img-fluid mb-3">
                                        </div>
                                        <h4 class="mt-2">{{ $laporan->siswa->nama }}</h4>
                                        <p class="fs-6 fw-normal">Kelas: {{ $laporan->siswa->kelas->nama }}</p>
                                        <div class="mt-auto">
                                            <!-- Tombol Cetak -->
                                            <a href="{{ route('lapor-keterlambatan.cetak', $laporan->id) }}" class="btn bg-gradient-success mb-2 w-100">Cetak Surat Izin</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Biodata dan Detail Keterlambatan -->
                                <div class="col-md-8">
                                    <div class="card shadow-lg p-3 bg-body rounded">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active fs-6 fw-bold link-dark" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab" aria-controls="biodata" aria-selected="true">Detail Keterlambatan</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <!-- Biodata Content -->
                                            <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
                                                <table class="table table-striped mt-3">
                                                    <tr class="align-middle" height="50px">
                                                        <th class="col-4">Nama Lengkap</th>
                                                        <td>{{ $laporan->siswa->nama }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Kelas</th>
                                                        <td>{{ $laporan->siswa->kelas->nama }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Gender</th>
                                                        <td>{{ $laporan->siswa->gender->jenis }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Tanggal</th>
                                                        <td>{{ $laporan->hari }}, {{ $laporan->formatted_tanggal }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Alasan</th>
                                                        <td>{{ $laporan->alasan }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Guru Piket</th>
                                                        <td>{{ $laporan->guru->nama }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="50px">
                                                        <th>Poin Pelanggaran</th>
                                                        <td>{{ $laporan->poin }}</td>
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
