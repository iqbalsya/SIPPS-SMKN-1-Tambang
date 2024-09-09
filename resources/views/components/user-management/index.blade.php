<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="users"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Users"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @if(session('success'))
                <div class="alert alert-light alert-dismissible text-dark fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">thumb_up</span>
                    </span>
                    <strong>&nbsp;Berhasil&nbsp;-&nbsp;</strong>{{ session('success') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">error</span>
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
                                <h4 class="text-white text-capitalize ps-3">Daftar User SIPPS SMKN 1 Tambang</h4>
                            </div>
                        </div> 
                        <div class="container mt-2 mb-3">                            

                            <div class="mt-3 d-flex justify-content-between">
                                <div class="d-flex gap-2">
                                    <div class="col-md-8">
                                        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group">
                                                <input type="file" name="file" class="form-control">
                                                <button class="btn bg-gradient-success mb-0" type="submit">Import User</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <a class="btn bg-gradient-success mb-0" href="{{ route('users.downloadTemplate') }}">
                                            <i class="material-icons text-xl">file_download</i>&nbsp;Template
                                        </a>
                                    </div>
                                    <div>
                                        <a class="btn bg-gradient-success px-3" data-bs-toggle="modal" data-bs-target="#guideModal">
                                            <i class="material-icons text-xl">emoji_objects</i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="col-md-5">
                                    <form action="{{ route('users.index') }}" method="GET" class="d-flex gap-2">
                                        <div>
                                            <select name="role" class="form-control" aria-label="Filter Role">
                                                <option value="">Semua Role</option>
                                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="wali-kelas" {{ request('role') == 'wali-kelas' ? 'selected' : '' }}>Wali Kelas</option>
                                                <option value="guru" {{ request('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                                                <option value="siswa" {{ request('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn bg-gradient-success">Filter</button>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <a class="btn bg-gradient-success mb-0" href="{{ route('users.create') }}">
                                        <i class="material-icons text-xl">add</i>&nbsp;Tambah User
                                    </a>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="guideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold text-center" id="exampleModalLabel">Petunjuk Pengisian Template Excel untuk Import User</h5>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <li>Pastikan email yang diisi belum ada pada table sebelumnya</li>
                                                <li>Kolom siswa hanya perlu diisi jika user merupakan seorang siswa</li>
                                                <li>Jika user adalah siswa, pastikan penulisan nama siswa sesuai dengan nama yang ada pada tabel siswa di aplikasi</li>
                                                <li>Kolom role hanya bisa diisi oleh berikut ini:
                                                    <ul>
                                                        <li>admin</li>
                                                        <li>wali-kelas</li>
                                                        <li>guru</li>
                                                        <li>siswa</li>
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
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center" width="200px">Email</th>
                                        <th class="text-center" width="50px">Role</th>
                                        <th class="text-center">Siswa</th>
                                        <th class="text-center" width="50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-2">{{ $user->name }}</td>
                                        <td class="ps-2">{{ $user->email }}</td>
                                        <td class="ps-2">{{ $user->roles->pluck('name')->first() }}</td>
                                        <td class="ps-2">{{ $user->siswa ? $user->siswa->nama : '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $user->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                            lengthMenu: "Tampilkan _MENU_ data user",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ user",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        }
                    });
                });

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus user ini?');
                }
            </script>
        </main>
    </x-layout>
