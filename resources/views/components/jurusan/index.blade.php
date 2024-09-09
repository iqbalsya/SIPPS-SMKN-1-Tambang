<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="jurusan"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Daftar Jurusan"></x-navbars.navs.auth>
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
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Daftar Jurusan</h4>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">

                            <div class=" my-3 text-end">
                                @haspermission('mengelola jurusan')
                                    <a class="btn bg-gradient-success mb-0 px-3" href="{{ route('jurusan.create') }}">
                                        <i class="material-icons text-xl">add</i>&nbsp;Tambah Jurusan
                                    </a>
                                @endhaspermission
                            </div>

                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="220px">Nama</th>
                                        <th class="text-center">Ketua Jurusan</th>
                                        <th class="text-center" width="50px">Jumlah Siswa</th>
                                        <th class="text-center" width="50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurusans as $jurusan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-3">{{ $jurusan->nama }}</td>
                                        <td class="ps-3">{{ $jurusan->guru->nama }}</td>
                                        <td class="text-center">{{ $jurusan->jumlah_siswa }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('jurusan.show', $jurusan->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>

                                            @haspermission('mengelola jurusan')
                                                <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                                <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?');">
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
                            lengthMenu: "Tampilkan _MENU_ data jurusan",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ jurusan",
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
