<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="sanksi-pelanggaran"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Edit Sanksi Pelanggaran"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-warning shadow-warning border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit Sanksi Pelanggaran</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sanksi-pelanggaran.update', $sanksiPelanggaran->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Sanksi Pelanggaran&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $sanksiPelanggaran->nama) }}">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="akumulasi_poin">Akumulasi Poin&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('akumulasi_poin') is-invalid @enderror" id="akumulasi_poin" name="akumulasi_poin" value="{{ old('akumulasi_poin', $sanksiPelanggaran->akumulasi_poin) }}" min="0">
                                            @error('akumulasi_poin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('sanksi-pelanggaran.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
                                    <button type="submit" class="btn btn-warning mb-0 mt-3">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>