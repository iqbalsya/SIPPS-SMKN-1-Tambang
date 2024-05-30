<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="siswa"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Siswa"></x-navbars.navs.auth>
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
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-3">Daftar Siswa SMKN 1 Tambang</h5>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">
                            <div class=" my-3 text-end">
                                <a class="btn bg-gradient-info mb-0" href="{{ route('siswa.create') }}">
                                    <i class="material-icons text-sm">add</i>&nbsp;Tambah Siswa
                                </a>
                            </div>
                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="64px">NIS</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center" width="50px">Kelas</th>
                                        <th class="text-center" width="50px">Gender</th>
                                        <th class="text-center" width="50px">Total Poin</th>
                                        <th class="text-center" width="50px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $s->nis }}</td>
                                        <td class="ps-4">{{ $s->nama }}</td>
                                        <td class="text-center">{{ $s->kelas->nama }}</td>
                                        <td class="text-center">{{ $s->gender->jenis }}</td>
                                        <td class="text-center">{{ $s->total_poin }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('siswa.show', $s->id)}}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>
                                            <a href="{{ route('siswa.edit', $s->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>
                                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2"><i class="material-icons">delete</i></button>
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

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus siswa ini?');
                }
            </script>
        </div>
    </main>
</x-layout>
