<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="buku-pelanggaran-kelas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Buku Pelanggaran Kelas {{ $kelas->nama }}"></x-navbars.navs.auth>
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
                                <h4 class="text-white text-capitalize ps-3">Buku Pelanggaran Kelas {{ $kelas->nama }}</h4>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">

                            <div class="d-flex justify-content-between">
                                <div class="d-flex mt-3 mb-1">
                                    <div class="col-md-4 me-2">
                                        <input type="date" id="start-date" class="form-control" placeholder="Tanggal Awal">
                                    </div>
                                    <div class="col-md-4 me-2">
                                        <input type="date" id="end-date" class="form-control" placeholder="Tanggal Akhir">
                                    </div>
                                    <div class="me-2">
                                        <button id="filter-tanggal" class="btn btn-success">Filter</button>
                                    </div>
                                    <div>
                                        <button id="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>

                                <!-- Tombol Tambah Catatan Pelanggaran -->
                                @haspermission('mengelola buku pelanggaran kelas')
                                    <div class="mb-4 mt-3">
                                        <a class="btn bg-gradient-success mb-0" href="{{ route('buku-pelanggaran-kelas.create') }}">
                                            <i class="material-icons text-xl">add</i>&nbsp;Catat Pelanggaran
                                        </a>
                                    </div>
                                @endhaspermission
                            </div>

                            <!-- Tabel Buku Pelanggaran -->
                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="120px">Siswa</th>
                                        <th class="text-center" width="300px">Pelanggaran</th>
                                        <th class="text-center" width="10px">Poin</th>
                                        <th class="text-center" width="50px">Hari, Tanggal</th>
                                        @haspermission('mengelola buku pelanggaran')
                                            <th class="text-center" width="80px">Aksi</th>
                                        @endhaspermission
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukuPelanggarans as $bukuPelanggaran)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $bukuPelanggaran->siswa->nama }}</td>
                                        <td class="ps-2" style="word-wrap: break-word; white-space: normal;">{{ $bukuPelanggaran->pelanggaran->deskripsi }}</td>
                                        <td class="text-center" style="word-wrap: break-word; word-break: break-all; white-space: normal;">{{ $bukuPelanggaran->poin }}</td>
                                        <td class="ps-2">{{ $bukuPelanggaran->hari }}, {{ $bukuPelanggaran->formatted_tanggal }}</td>
                                        
                                        <!-- Aksi -->
                                        @haspermission('mengelola buku pelanggaran')
                                            <td class="text-center">
                                                <a href="{{ route('buku-pelanggaran-kelas.show', $bukuPelanggaran->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2">
                                                    <i class="material-icons">visibility</i>
                                                </a>

                                                <a href="{{ route('buku-pelanggaran-kelas.edit', $bukuPelanggaran->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <form action="{{ route('buku-pelanggaran-kelas.destroy', $bukuPelanggaran->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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

            <script type="text/javascript">
                $(document).ready(function() {
                    var table = $('.data-table').DataTable({
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data buku pelanggaran",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ pelanggaran",
                            infoFiltered: "(difilter dari _MAX_ total pelanggaran)",
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
                                    columns: [1, 2, 3, 4, 5]
                                }
                            },
                            {
                                extend: 'print',
                                text: '',
                                className: 'btn-md btn-success fa fa-print fa mb-0',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5]
                                }
                            }
                        ]
                    });

                    function filterTable() {
                        var startDate = $('#start-date').val();
                        var endDate = $('#end-date').val();

                        $.fn.dataTable.ext.search = [];

                        if (startDate && endDate) {
                            var start = new Date(startDate);
                            var end = new Date(endDate);
                            $.fn.dataTable.ext.search.push(
                                function(settings, data, dataIndex) {
                                    var date = new Date(data[4].split(', ')[1]); // kolom tanggal
                                    return date >= start && date <= end;
                                }
                            );
                        }

                        table.draw();
                    }

                    $('#filter-tanggal').on('click', function() {
                        filterTable();
                    });

                    $('#reset').on('click', function() {
                        $('#start-date').val('');
                        $('#end-date').val('');
                        $.fn.dataTable.ext.search = [];
                        table.draw();
                    });

                    setTimeout(function() {
                        $('.alert').fadeOut('slow', function() {
                            $(this).remove();
                        });
                    }, 5000);
                });

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus pelanggaran ini?');
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
