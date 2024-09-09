<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="lapor-keterlambatan"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Lapor Keterlambatan"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-light alert-dismissible text-dark fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">thumb_up</span>
                    </span>
                    <strong>&nbsp;Berhasil&nbsp;-&nbsp;</strong>{{ session('success') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-3 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Data Keterlambatan Siswa</h4>
                                <p class="text-white ps-3 fw-normal mt-n2 mb-1">Lapor keterlambatan dan cetak surat izin masuk kelas</p>
                            </div>
                        </div>
                        <div class="container pt-2 mb-3">
                            <div class="my-3 text-end">
                                <a class="btn bg-gradient-success mb-0" href="{{ route('lapor-keterlambatan.create') }}">
                                    <i class="material-icons text-xl">add</i>&nbsp;Lapor Keterlambatan
                                </a>
                            </div>
                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="50px">Tanggal</th>
                                        <th class="text-center" width="440px">Nama Siswa</th>
                                        <th class="text-center" width="20px">Kelas</th>
                                        <th class="text-center" width="20px">Gender</th>
                                        <th class="text-center" width="240px">Guru Piket</th>
                                        <th class="text-center" width="10px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelanggaranTerlambat as $index => $bukuPelanggaran)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>

                                        <td class="ps-2">
                                            {{ $bukuPelanggaran->hari }}, {{ $bukuPelanggaran->formatted_tanggal ?? 'Tidak ada tanggal' }}
                                        </td>

                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $bukuPelanggaran->siswa->nama ?? 'Tidak ada nama' }}</td>

                                        <td class="ps-2">{{ $bukuPelanggaran->siswa->kelas->nama ?? 'Tidak ada kelas' }}</td>

                                        <td class="ps-2">{{ $bukuPelanggaran->siswa->gender->jenis ?? 'Tidak ada gender' }}</td>

                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $bukuPelanggaran->guru->nama ?? 'Tidak ada guru' }}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{ route('lapor-keterlambatan.show', $bukuPelanggaran->id) }}" class="edit btn btn-info btn-link btn-md m-0 py-2 px-3"><i class="material-icons">visibility</i></a>
                                        </td>                                        
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data pelanggaran terlambat datang ke sekolah.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.data-table').DataTable({
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data siswa",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ siswa",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        }
                    });

                    setTimeout(function() {
                        $('.alert').fadeOut('slow', function() {
                            $(this).remove();
                        });
                    }, 5000);
                });
            </script>
        </div>
    </main>
</x-layout>
