<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Siswa"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
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
                                <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User</a>
                            </div>
                            <table class="table table-striped table-bordered data-table text-center">
                                <thead>
                                    <tr>
                                        <th width="16px">No</th>
                                        <th width="64px">NIS</th>
                                        <th>Nama</th>
                                        <th width="105px">Kelas</th>
                                        <th width="105px">Gender</th>
                                        <th width="105px">Action</th>
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
                        paging: true,
                        ajax: "{{ route('siswa.index') }}",
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
                .data-table td:last-child, .data-table th:last-child {
                    border-right: 1px solid black;
                }

                .data-table {
                    border: 1px solid #d4d4d4; /* Ubah nilai ketebalan dan warna sesuai keinginan */
                }

                .data-table th, .data-table td {
                    border: 1px solid gainsboro !important; /* Ubah nilai ketebalan dan warna sesuai keinginan */
                }

                /* Atur ulang gaya pagination DataTables */
                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    border-radius: 0.25rem;
                    background-color: #f3f3f3;
                    border: 1px solid transparent;
                }

                .page-item.active .page-link {
                    z-index: 3;
                    color: #fff;
                    background-color: rgba(0, 81, 255, 0.836);
                    border-color: #e91e63;
                    width: 36px;
                    height: 36px;
                }

                .page-item .page-link {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #7b809a;
                    padding: 0;
                    margin: 0 3px;
                    border-radius: 12% !important;
                    width: 72px;
                    height: 36px;
                    font-size: 0.875rem;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                    background: #f3f3f3;
                    border: 1px solid #ddd;
                }

                /* Atur ulang gaya input pencarian */
                .dataTables_wrapper .dataTables_filter input {
                    border-radius: 0.25rem;
                    border: 1px solid #ddd;
                    padding: 0.5rem;
                }
            </style>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
