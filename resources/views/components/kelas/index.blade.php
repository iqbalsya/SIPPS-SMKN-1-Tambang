<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="kelas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Daftar Kelas"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
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

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                    <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                    error
                    </span>
                    </span>
                    <strong>&nbsp;Gagal&nbsp;-&nbsp;</strong>{{ session('error') }}
                    <button type="button" class="btn-close text-white text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Daftar Kelas</h4>
                            </div>
                        </div>

                        <div class="container mt-2 mb-3">

                            <div class="my-3 text-end">
                                @haspermission('mengelola kelas')
                                    <a class="btn bg-gradient-success mb-0" href="{{ route('kelas.create') }}">
                                        <i class="material-icons text-xl">add</i>&nbsp;Tambah Kelas
                                    </a>
                                @endhaspermission
                            </div>

                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center" width="120px">Nama</th>
                                        <th class="text-center">Wali Kelas</th>
                                        <th class="text-center" width="50px">Jumlah Siswa</th>
                                        <th class="text-center" width="150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $k)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-3">
                                            @php
                                                $badgeClass = '';
                                                
                                                if (str_contains($k->nama, 'XII')) {
                                                    $badgeClass = 'badge bg-danger';
                                                } elseif (str_contains($k->nama, 'XI')) {
                                                    $badgeClass = 'badge bg-warning';
                                                } elseif (str_contains($k->nama, 'X')) {
                                                    $badgeClass = 'badge bg-info';
                                                }
                                            @endphp
                                            <span class="{{ $badgeClass }}">{{ $k->nama }}</span>
                                        </td>
                                        <td class="ps-3">{{ $k->guru->nama }}</td>
                                        <td class="text-center">{{ $k->jumlah_siswa }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kelas.show', $k->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2">
                                                <i class="material-icons">visibility</i>
                                            </a>
                            
                                            @haspermission('mengelola kelas')
                                                <a href="{{ route('kelas.edit', $k->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2">
                                                    <i class="material-icons">edit</i>
                                                </a>
                            
                                                <form action="{{ route('kelas.upgrade', $k->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menaikkan kelas ini?');">
                                                    @csrf
                                                    <button type="submit" class="edit btn btn-success btn-link btn-md m-0 p-2">
                                                        <i class="material-icons">arrow_upward</i>
                                                    </button>
                                                </form>
                            
                                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2">
                                                        <i class="material-icons">delete</i>
                                                    </button>
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
                            lengthMenu: "Tampilkan _MENU_ data kelas",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ kelas",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        }
                    });

                    // setTimeout(function() {
                    //     $('.alert').fadeOut('slow', function() {
                    //         $(this).remove();
                    //     });
                    // }, 5000);
                });
            </script>

            <style>
                .badge {
                    font-size: 0.9em;
                    font-weight: 600;
                    padding: 0.5em 0.75em;
                    border-radius: 0.375rem;
                }

            </style>
        </div>
    </main>
</x-layout>
