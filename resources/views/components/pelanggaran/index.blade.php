<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="pelanggaran"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg page-pelanggaran">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Pelanggaran"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <div class="bg-gradient-danger shadow-danger border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Daftar Bentuk Pelanggaran</h4>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">

                            <div class="d-flex justify-content-between">

                                <x-navbars.navs.pelanggaran activePage="pelanggaran"></x-navbars.navs.pelanggaran>

                                @haspermission('mengelola pelanggaran')
                                    <div class="my-3">
                                        <a class="btn bg-gradient-danger mb-0" href="{{ route('pelanggaran.create') }}">
                                            <i class="material-icons text-xl position-relative">add</i>&nbsp;Tambah Pelanggaran
                                        </a>
                                    </div>
                                @endhaspermission
                            </div>

                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center" width="80px">Tipe Pelanggaran</th>
                                        <th class="text-center" width="16px">Poin</th>
                                        <th class="text-center" width="80px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggaran as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        <td class="ps-3" style="word-wrap: break-word; white-space: normal;">{{ $p->deskripsi }}</td>

                                        <td class="text-center">{{ $p->tipePelanggaran->nama }}</td>

                                        <td class="text-center">{{ $p->poin }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('pelanggaran.show', $p->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>

                                            @haspermission('mengelola pelanggaran')
                                                <a href="{{ route('pelanggaran.edit', $p->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                                <form action="{{ route('pelanggaran.destroy', $p->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2"><i class="material-icons">delete</button>
                                                </form>
                                            @endhaspermission
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
                    $('.data-table').DataTable({
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data pelanggaran",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ pelanggaran",
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

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus pelanggaran ini?');
                }
            </script>
        </div>
    </main>
</x-layout>
