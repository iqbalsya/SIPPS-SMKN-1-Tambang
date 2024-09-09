<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="pelanggaran"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tambah Pelanggaran"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Tambah Pelanggaran</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pelanggaran.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="deskripsi">Deskripsi&nbsp;<span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="poin">Poin&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('poin') is-invalid @enderror" id="poin" name="poin" value="{{ old('poin') }}" min="0">
                                            @error('poin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tipe_pelanggaran_id">Tipe Pelanggaran&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('tipe_pelanggaran_id') is-invalid @enderror" id="tipe_pelanggaran_id" name="tipe_pelanggaran_id">
                                                <option value="" selected disabled>Pilih Tipe Pelanggaran</option>
                                                @foreach ($tipePelanggaran as $tp)
                                                    <option value="{{ $tp->id }}" {{ old('tipe_pelanggaran_id') == $tp->id ? 'selected' : '' }}>{{ $tp->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('tipe_pelanggaran_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
                                    <button type="submit" class="btn btn-success mb-0 mt-3">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
