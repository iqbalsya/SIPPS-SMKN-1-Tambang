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
                    <button type="button" class="btn-close text-xl py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                    <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                    error
                    </span>
                    </span>
                    <strong>&nbsp;Gagal&nbsp;-&nbsp;</strong>{{ session('error') }}
                    <button type="button" class="btn-close text-white text-xl py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif


            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Daftar Siswa SMKN 1 Tambang</h4>
                            </div>
                        </div>
                        <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="container mt-4 mb-3">

                            @haspermission('mengelola siswa')
                                <div class="mb-3 mt-4 d-flex justify-content-between">
                                    <div class="d-flex gap-2">
                                        <div class="col-md-8">
                                            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="file" name="file" class="form-control">
                                                    <button class="btn bg-gradient-success mb-0" type="submit">Import Siswa</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <a class="btn bg-gradient-success mb-0" href="{{ route('siswa.downloadTemplate') }}">
                                                <i class="material-icons text-xl">file_download</i>&nbsp;Template
                                            </a>
                                        </div>
                                        <div>
                                            <a class="btn bg-gradient-success px-3" data-bs-toggle="modal" data-bs-target="#guideModal">
                                                <i class="material-icons text-xl">emoji_objects</i>
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <a class="btn bg-gradient-success mb-0" href="{{ route('siswa.create') }}">
                                            <i class="material-icons text-xl">add</i>&nbsp;Tambah Siswa
                                        </a>
                                    </div>
                                </div>
                            @endhaspermission


                            <!-- Modal -->
                            <div class="modal fade" id="guideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold text-center" id="exampleModalLabel">Petunjuk Pengisian Template Excel untuk Import Data Siswa</h5>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <li>Pastikan penulisan nama kelas sesuai dengan yang ada pada tabel kelas di aplikasi</li>
                                                <li>Pastikan penulisan nama jurusan sesuai dengan yang ada pada tabel jurusan di aplikasi</li>
                                                <li>Tanggal lahir siswa tidak dapat disikan melalui import data excel</li>
                                                <li>Kolom gender hanya bisa diisi oleh berikut ini:
                                                    <ul>
                                                        <li>Laki laki</li>
                                                        <li>Perempuan</li>
                                                    </ul>
                                                </li>
                                                <li>Kolom agama hanya bisa diisi oleh berikut ini:
                                                    <ul>
                                                        <li>Islam</li>
                                                        <li>Kristen</li>
                                                        <li>Katolik</li>
                                                        <li>Hindu</li>
                                                        <li>Buddha</li>
                                                        <li>Khonghucu</li>
                                                    </ul>
                                                </li>
                                                <li>Kolom status_dalam_keluarga hanya bisa diisi oleh berikut ini:
                                                    <ul>
                                                        <li>Anak kandung</li>
                                                        <li>Anak angkat</li>
                                                        <li>Tinggal bersama wali</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary mb-2" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="64px">NIS/NISN</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center" width="50px">Kelas</th>
                                        <th class="text-center" width="50px">Gender</th>
                                        <th class="text-center" width="50px">Total Poin</th>
                                        <th class="text-center" width="50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-2">{{ $s->nis_nisn }}</td>
                                        <td class="ps-2">{{ $s->nama }}</td>
                                        <td class="ps-2">{{ $s->kelas->nama }}</td>
                                        <td class="ps-2">{{ $s->gender->jenis }}</td>
                                        <td class="text-center">{{ $s->total_poin }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('siswa.show', $s->id)}}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>
                                        @haspermission('mengelola siswa')
                                            <a href="{{ route('siswa.edit', $s->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>
                                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2"><i class="material-icons">delete</i></button>
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
                            lengthMenu: "Tampilkan _MENU_ data siswa",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ siswa",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        }
                    });

                // setTimeout(function() {
                //         $('.alert').fadeOut('slow', function() {
                //             $(this).remove();
                //         });
                //     }, 5000);
                });

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus siswa ini?');
                }
            </script>
        </div>
    </main>
</x-layout>
