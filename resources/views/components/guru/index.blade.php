<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="guru"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Guru"></x-navbars.navs.auth>
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
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Daftar Guru</h6>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">
                            <div class=" my-3 text-end">
                                <a class="btn bg-gradient-success mb-0 px-4" href="{{ route('guru.create') }}">
                                    <i class="material-icons text-sm">add</i>&nbsp;Tambah Guru
                                </a>
                            </div>
                            <table class="table table-striped table-bordered data-table text-center mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="16px">No</th>
                                        <th>Nama</th>
                                        <th width="120px">Posisi</th>
                                        <th width="96px">Gender</th>
                                        <th width="104px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru as $g)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $g->nama }}</td>
                                        <td>{{ $g->posisi }}</td>
                                        <td>{{ $g->gender->jenis }}</td>
                                        <td>
                                            <a href="" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>

                                            <a href="{{ route('guru.edit', $g->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                            <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2"><i class="material-icons">delete</button>
                                            </form>
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
                    lengthMenu: "Tampilkan _MENU_ data guru",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ guru",
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

        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus guru ini?');
        }
    </script>
    </main>
</x-layout>
