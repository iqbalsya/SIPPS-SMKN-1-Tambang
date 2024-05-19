<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Siswa"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Daftar Siswa</h6>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">
                            <div class=" my-3 text-end">
                                <a class="btn bg-gradient-success mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">add</i>&nbsp;Tambah Siswa</a>
                            </div>
                            <table class="table table-striped table-bordered data-table text-center mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="16px">No</th>
                                        <th width="64px">NIS</th>
                                        <th>Nama</th>
                                        <th width="84px">Kelas</th>
                                        <th width="96px">Gender</th>
                                        <th width="104px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    var table = $('.data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('siswa.index') }}",
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data siswa",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ siswa",
                            paginate: {
                                previous: '<i class="fas fa-angle-double-left" style="font-size: 1.1rem;"></i>',
                                next: '<i class="fas fa-angle-double-right" style="font-size: 1.1rem;"></i>'
                            }
                        },
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'nis', name: 'nis'},
                            {data: 'nama', name: 'nama'},
                            {data: 'kelas', name: 'kelas'},
                            {data: 'gender', name: 'gender'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
                });
            </script>

            <style>

                .dataTables_wrapper .dataTables_sort_wrapper .sortable {
                    vertical-align: middle !important; /* Atur line-height sesuai kebutuhan */
                }


                .data-table tbody td {
                    vertical-align: middle; /* Bisa juga menggunakan top atau bottom sesuai kebutuhan */
                }

                .data-table {
                    border: 1px solid #d4d4d4; /* Ubah nilai ketebalan dan warna sesuai keinginan */
                }

                .table.data-table {
                    margin-bottom: 16px !important;
                }

                .data-table th, .data-table td {
                    border: 1px solid gainsboro !important; /* Ubah nilai ketebalan dan warna sesuai keinginan */
                    border-right: 1px solid gainsboro; /* Menambahkan border kanan dengan ketebalan yang sama */
                }

                /* Aturan CSS lebih spesifik untuk mengatasi border-right-width yang tidak diinginkan */
                .table.table-bordered.dataTable {
                    border-right-width: 1px !important; /* Ubah menjadi 1px atau sesuai kebutuhan Anda */
                }

                /* CSS untuk mengatur border antara thead dan tbody */
                .data-table thead tr:last-child th {
                    border-bottom: 2px solid gainsboro !important; /* Ubah nilai dan warna sesuai keinginan */
                }

                /* Atur ulang gaya pagination DataTables */
                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    border-radius: 12% !important;
                    border: 1px solid transparent;
                }

                .page-item.active .page-link {
                    color: #fff;
                    background-color: #4ba64f;
                    border-color: rgb(189, 189, 189);
                }

                .page-item .page-item.active .page-link {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #7b809a;
                    width: 72px;
                    height: 36px;
                    font-size: 0.875rem;
                    border-radius: 12% !important;
                    margin: 0;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                    border-radius: 12% !important;
                    cursor: pointer; /* Menunjukkan bahwa ini bisa diklik */
                }

                /* Gaya dasar untuk input pencarian DataTables */
                .dataTables_wrapper .dataTables_filter input {
                    border-radius: 0.5rem;
                    border: 1px solid #ddd;
                    padding: 0.5rem;
                    transition: border-color 0.3s ease; /* Transisi halus untuk perubahan border */
                }

                /* Efek hover untuk input pencarian DataTables */
                .dataTables_wrapper .dataTables_filter input:hover {
                    border-color: #4ba64f; /* Warna border saat di-hover */
                }

                /* Efek fokus untuk input pencarian DataTables */
                .dataTables_wrapper .dataTables_filter input:focus {
                    border-color: #4ba64f; /* Warna border saat input fokus */
                    outline: none; /* Menghilangkan outline default pada input fokus */
                }

                /* Memperbaiki tampilan dropdown "Show entries" */
                .dataTables_wrapper .dataTables_length select {
                    width: 38px !important; /* Menyesuaikan lebar secara otomatis */
                    padding: 0.25rem 0.20rem; /* Padding pada bagian atas dan bawah */
                    font-size: 0.875rem; /* Ukuran font */
                    line-height: 1.5; /* Ketinggian baris */
                    border-radius: 4px; /* Membuat sudut border membulat */
                    border: 1px solid #ced4da; /* Warna border */
                    margin: 0 4px;
                }

                .dataTables_wrapper .dataTables_length select:focus {
                    border-color: #4ba64f; /* Warna border saat fokus */
                    outline: 0; /* Hilangkan outline */
                    box-shadow: 0 0 0 0.1rem #4ba650a9(0, 255, 42, 0.336); /* Efek bayangan saat fokus */
                }

                table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc_disabled:before {
                    right: 1em;
                    content: "↑";
                    bottom: 27%;
                }

                table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:after {
                    right: .5em;
                    content: "↓";
                    bottom: 27%;
                }
            </style>
        </div>
    </main>
    {{-- <x-plugins></x-plugins> --}}
</x-layout>
