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
                        <span class="material-icons text-md">
                            thumb_up
                        </span>
                    </span>
                    <strong>&nbsp;Berhasil&nbsp;-&nbsp;</strong>{{ session('success') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-3 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Lapor Keterlambatan Siswa</h4>
                                <p class="text-white ps-3 fw-normal mt-n2 mb-1">Tambah keterlambatan dan cetak surat</p>
                            </div>
                        </div>
                        <div class="container pt-2 mb-3">
                            <div class=" my-3 text-end">
                                <a class="btn bg-gradient-info mb-0" href="{{ route('lapor-keterlambatan.create') }}">
                                    <i class="material-icons text-xl">add</i>&nbsp;Lapor Keterlambatan
                                </a>
                            </div>
                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="160px">Tanggal</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center" width="70px">Kelas</th>
                                        <th class="text-center" width="100px">Jenis Kelamin</th>
                                        <th class="text-center" width="240px">Guru Piket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelanggaranTerlambat as $index => $bukuPelanggaran)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="ps-2">
                                            {{ $bukuPelanggaran->formatted_tanggal ?? 'Tidak ada tanggal' }}
                                        </td>
                                        <td class="ps-3">{{ $bukuPelanggaran->siswa->nama ?? 'Tidak ada nama' }}</td>
                                        <td class="text-center">{{ $bukuPelanggaran->siswa->kelas->nama ?? 'Tidak ada kelas' }}</td>
                                        <td class="text-center">{{ $bukuPelanggaran->siswa->gender->jenis ?? 'Tidak ada gender' }}</td>
                                        <td class="ps-3">{{ $bukuPelanggaran->guru->nama ?? 'Tidak ada guru' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pelanggaran terlambat datang ke sekolah.</td>
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
                                previous: '<i class="fas fa-angle-double-left" style="font-size: 1.1rem;"></i>',
                                next: '<i class="fas fa-angle-double-right" style="font-size: 1.1rem;"></i>'
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
