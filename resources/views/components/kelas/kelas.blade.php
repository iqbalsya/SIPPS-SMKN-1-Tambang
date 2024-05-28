<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="kelas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth :titlePage="'Detail Kelas - ' . $kelas->nama"></x-navbars.navs.auth>
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
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-3 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Kelas {{ $kelas->nama }}</h4>
                                <p class="text-white text-capitalize ps-3 fw-normal mt-n2 mb-1">Wali Kelas : {{ $kelas->guru->nama }}</p>
                            </div>
                        </div>
                        <div class="container pt-4 mb-3">
                            <div class="mb-4">
                                <span class="badge bg-gradient-info px-4 py-3 fs-7">Jumlah Siswa : {{ $kelas->jumlah_siswa }}</span>
                                <span class="badge bg-gradient-info px-4 py-3 mx-3 fs-7">Jumlah Siswa laki-laki : {{ $kelas->jumlah_siswa_laki_laki }}</span>
                                <span class="badge bg-gradient-info px-4 py-3 fs-7">Jumlah Siswa Perempuan : {{ $kelas->jumlah_siswa_perempuan }}</span>
                            </div>
                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center" width="100px">Gender</th>
                                        <th class="text-center" width="16px">Total Poin</th>
                                        <th class="text-center" width="120px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas->siswa as $siswa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-4">{{ $siswa->nama }}</td>
                                        <td class="text-center">{{ $siswa->gender->jenis }}</td>
                                        <td class="text-center">{{ $siswa->total_poin }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('siswa.show', $siswa->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>

                                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
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
            </script>
        </div>
    </main>
</x-layout>
