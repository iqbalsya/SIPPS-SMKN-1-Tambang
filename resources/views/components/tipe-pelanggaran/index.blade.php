<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="pelanggaran"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tipe Pelanggaran"></x-navbars.navs.auth>
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
                                <h6 class="text-white text-capitalize ps-3">Daftar Tipe Pelanggaran</h6>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">

                            <div class="d-flex justify-content-between">

                                <x-navbars.navs.pelanggaran activePage="tipe-pelanggaran"></x-navbars.navs.pelanggaran>

                                {{-- <div class="nav-wrapper position-relative my-4">
                                    <ul class="nav"></>
                                        <ul class="nav nav-pills nav-fill" role="tablist">
                                            <li class="nav-item px-4">
                                                <a class="nav-link mb-0 px-0 py-1 active" href="{{ route('pelanggaran.index') }}"
                                                    role="tab" aria-selected="true">
                                                    <i class="material-icons text-lg position-relative">home</i>
                                                    <span class="ms-1">List Pelanggaran</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <ul class="nav nav-pills nav-fill" role="tablist">
                                                <li class="nav-item px-4">
                                                    <a class="nav-link mb-0 px-0 py-1 active" href="{{ route('tipe-pelanggaran.index') }}"
                                                        role="tab" aria-selected="true">
                                                        <i class="material-icons text-lg position-relative">email</i>
                                                        <span class="ms-1">Tipe Pelanggaran</span>
                                                    </a>
                                                </li>
                                            </li>
                                        </ul>

                                        <ul class="nav nav-pills nav-fill" role="tablist">
                                            <li class="nav-item px-4">
                                                <a class="nav-link mb-0 px-0 py-1 active" href="{{ route('sanksi-pelanggaran.index') }}"
                                                    role="tab" aria-selected="true">
                                                    <i class="material-icons text-lg position-relative">settings</i>
                                                    <span class="ms-1">Sanksi Pelanggaran</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </ul>
                                </div> --}}

                                <div class="my-3 text-end">
                                    <a class="btn bg-gradient-danger mb-0" href="{{ route('tipe-pelanggaran.create') }}">
                                        <i class="material-icons text-xl position-relative">add</i>&nbsp;Tambah Tipe Pelanggaran
                                    </a>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered data-table mb-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center">Tipe Pelanggaran</th>
                                        <th class="text-center" width="104px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipePelanggarans as $tp)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="ps-4">{{ $tp->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('tipe-pelanggaran.edit', $tp->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                            <form action="{{ route('tipe-pelanggaran.destroy', $tp->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                            lengthMenu: "Tampilkan _MENU_ data tipe pelanggaran",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ tipe pelanggaran",
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
                    return confirm('Apakah Anda yakin ingin menghapus tipe pelanggaran ini?');
                }
            </script>
        </div>
    </main>
</x-layout>
