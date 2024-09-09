<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="laporan-pelanggaran-kelas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Laporan Pelanggaran"></x-navbars.navs.auth>
        <div class="container-fluid">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @if(session('success'))
                <div class="alert alert-light alert-dismissible text-dark fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">thumb_up</span>
                    </span>
                    <strong>&nbsp;Berhasil&nbsp;-&nbsp;</strong>{{ session('success') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Laporan Pelanggaran Siswa Kelas {{ $kelasList->first()->nama }}</h4>
                            </div>
                        </div>
                        <div class="container mt-5 mb-3">
                            <!-- Tabel Laporan Pelanggaran -->
                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="120px">Siswa</th>
                                        <th class="text-center" width="20px">Kelas</th>
                                        <th class="text-center" width="300px">Pelanggaran</th>
                                        <th class="text-center" width="50px">Hari, Tanggal</th>
                                        <th class="text-center" width="120px">Guru Pelapor</th>
                                        <th class="text-center" width="50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporanPelanggarans as $laporanPelanggaran)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $laporanPelanggaran->siswa->nama }}</td>

                                        <td class="ps-2" style="word-wrap: break-word; word-break: break-all; white-space: normal;">{{ $laporanPelanggaran->siswa->kelas->nama }}</td>

                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $laporanPelanggaran->pelanggaran->deskripsi }}</td>

                                        <td class="ps-2">
                                            {{ $laporanPelanggaran->hari }}, {{ $laporanPelanggaran->formatted_tanggal }}
                                        </td>

                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $laporanPelanggaran->guru->nama }}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{ route('laporan-pelanggaran.validate', $laporanPelanggaran->id) }}" class="btn btn-success btn-link btn-md m-0 p-2" onclick="return confirm('Apakah Anda yakin ingin memvalidasi laporan ini?')">
                                                <i class="material-icons">check</i>
                                            </a>

                                            <a href="{{ route('laporan-pelanggaran.reject', $laporanPelanggaran->id) }}" class="btn btn-danger btn-link btn-md m-0 p-2" onclick="return confirm('Apakah Anda yakin ingin menolak laporan ini?')">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    var table = $('.data-table').DataTable({
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data laporan pelanggaran",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ laporan",
                            infoFiltered: "(difilter dari _MAX_ total laporan)",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        },
                        dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                        buttons: [
                            {
                                extend: 'excel',
                                text: '',
                                className: 'btn-md btn-success fa fa-file-excel fa mb-0',
                                exportOptions: {
                                    columns: [1, 2, 3, 4] // Kolom yang diexport (indeks mulai dari 0)
                                }
                            },
                            {
                                extend: 'print',
                                text: '',
                                className: 'btn-md btn-success fa fa-print fa mb-0',
                                exportOptions: {
                                    columns: [1, 2, 3, 4] // Kolom yang diexport (indeks mulai dari 0)
                                }
                            }
                        ]
                    });

                    setTimeout(function() {
                        $('.alert').fadeOut('slow', function() {
                            $(this).remove();
                        });
                    }, 5000);
                });

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus laporan ini?');
                }
            </script>

            <style>
                .top .dt-buttons {
                    display: inline-block;
                }
                .top .dataTables_filter {
                    float: right;
                }
                .top .dataTables_length {
                    display: inline-block;
                    margin-right: 16px;
                }
            </style>

        </div>
    </main>
</x-layout>
