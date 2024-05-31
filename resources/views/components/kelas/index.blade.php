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
                                <a class="btn bg-gradient-success mb-0" href="{{ route('kelas.create') }}">
                                    <i class="material-icons text-xl">add</i>&nbsp;Tambah Kelas
                                </a>
                            </div>
                            <table class="table table-striped table-bordered data-table text-center mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="16px">No</th>
                                        <th width="120px">Nama</th>
                                        <th>Wali Kelas</th>
                                        <th width="120px">Jumlah Siswa</th>
                                        <th width="120px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $k)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->nama }}</td>
                                        <td>{{ $k->guru->nama }}</td>
                                        <td>{{ $k->jumlah_siswa }}</td>
                                        <td>
                                            <a href="{{ route('kelas.show', $k->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>

                                            <a href="{{ route('kelas.edit', $k->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                            <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
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
                            lengthMenu: "Tampilkan _MENU_ data kelas",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ kelas",
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
