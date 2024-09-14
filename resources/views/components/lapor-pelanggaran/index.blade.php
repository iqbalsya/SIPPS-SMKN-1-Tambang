<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="lapor-pelanggaran"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Lapor Pelanggaran"></x-navbars.navs.auth>
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
                                <h4 class="text-white text-capitalize ps-3">Lapor Pelanggaran Siswa</h4>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">

                            <div class="d-flex justify-content-end mt-4 mb-3">

                                @haspermission('melaporkan keterlambatan')
                                    <div>
                                        <a class="btn bg-gradient-success mb-0" href="{{ route('lapor-pelanggaran.create') }}">
                                            <i class="material-icons text-xl">add</i>&nbsp;Buat Laporan
                                        </a>
                                    </div>
                                @endhaspermission
                            </div>

                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="120px">Siswa</th>
                                        <th class="text-center" width="20px">Kelas</th>
                                        <th class="text-center" width="300px">Pelanggaran</th>
                                        {{-- <th class="text-center" width="10px">Poin</th> --}}
                                        <th class="text-center" width="50px">Hari, Tanggal</th>
                                        @haspermission('melaporkan keterlambatan')
                                            <th class="text-center" width="80px">Aksi</th>
                                        @endhaspermission
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporanPelanggarans as $laporanPelanggaran)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $laporanPelanggaran->siswa->nama }}</td>
                                        <td>{{ $laporanPelanggaran->siswa->kelas->nama }}</td>
                                        <td>{{ $laporanPelanggaran->pelanggaran->deskripsi }}</td>
                                        {{-- <td class="text-center">{{ $laporanPelanggaran->poin }}</td> --}}
                                        <td>{{ $laporanPelanggaran->hari }}, {{ $laporanPelanggaran->formatted_tanggal }}</td>
                                        @haspermission('melaporkan keterlambatan')
                                            <td class="text-center">
                                                {{-- <a href="{{ route('lapor-pelanggaran.show', $$laporanPelanggaran->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2">
                                                    <i class="material-icons">visibility</i>
                                                </a> --}}
                                                <a href="{{ route('lapor-pelanggaran.edit', $laporanPelanggaran->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form action="{{ route('lapor-pelanggaran.destroy', $laporanPelanggaran->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endhaspermission
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    var table = $('.data-table').DataTable({
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data buku pelanggaran",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ pelanggaran",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        }
                    });

                    $('#filter-tanggal, #filter-kelas').on('click', function() {
                        filterTable();
                    });

                    $('#reset').on('click', function() {
                        $('#start-date, #end-date').val('');
                        $('#kelas-filter').val('');
                        table.draw();
                    });

                    setTimeout(() => { $('.alert').fadeOut('slow', () => $(this).remove()); }, 5000);
                });

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus pelanggaran ini?');
                }
            </script>

            <style>
                .top .dt-buttons { display: inline-block; }
                .top .dataTables_filter { float: right; }
                .top .dataTables_length { display: inline-block; margin-right: 16px; }
            </style>

        </div>
    </main>
</x-layout>
