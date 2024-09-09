<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="buku-pelanggaran-kelas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Edit Buku Pelanggaran"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Edit Pelanggaran</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('buku-pelanggaran-kelas.update', $bukuPelanggaran->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="kelas_id">Kelas&nbsp;<span class="text-danger">*</span></label>
                                            <!-- Menggunakan $kelasList -->
                                            <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" onchange="fetchSiswa(this.value)">
                                                <option value="" selected disabled>Pilih Kelas</option>
                                                @foreach ($kelasList as $kls)
                                                    <option value="{{ $kls->id }}" @if($bukuPelanggaran->kelas_id == $kls->id) selected @endif>{{ $kls->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="siswa_id">Siswa&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id">
                                                <option value="" selected disabled>Pilih Siswa</option>
                                                @foreach ($siswas as $sw)
                                                    <option value="{{ $sw->id }}" @if($bukuPelanggaran->siswa_id == $sw->id) selected @endif>{{ $sw->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('siswa_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tipe_pelanggaran_id">Tipe Pelanggaran&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('tipe_pelanggaran_id') is-invalid @enderror" id="tipe_pelanggaran_id" name="tipe_pelanggaran_id" onchange="fetchPelanggaran(this.value)">
                                                <option value="" selected disabled>Pilih Tipe Pelanggaran</option>
                                                @foreach ($tipePelanggaran as $tp)
                                                    <option value="{{ $tp->id }}" @if($bukuPelanggaran->tipe_pelanggaran_id == $tp->id) selected @endif>{{ $tp->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('tipe_pelanggaran_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="pelanggaran_id">Pelanggaran&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('pelanggaran_id') is-invalid @enderror" id="pelanggaran_id" name="pelanggaran_id">
                                                <option value="" selected disabled>Pilih Pelanggaran</option>
                                                @foreach ($pelanggarans as $pl)
                                                    <option value="{{ $pl->id }}" @if($bukuPelanggaran->pelanggaran_id == $pl->id) selected @endif>{{ $pl->deskripsi }}</option>
                                                @endforeach
                                            </select>
                                            @error('pelanggaran_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="guru_id">Wali Kelas&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('guru_id') is-invalid @enderror" id="guru_id" name="guru_id">
                                                <option value="" selected disabled>Pilih Guru</option>
                                                @foreach ($gurus as $gu)
                                                    <option value="{{ $gu->id }}" @if($bukuPelanggaran->guru_id == $gu->id) selected @endif>{{ $gu->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('guru_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="hari_tanggal">Hari dan Tanggal&nbsp;<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('hari_tanggal') is-invalid @enderror" id="hari_tanggal" name="hari_tanggal" value="{{ old('hari_tanggal', $bukuPelanggaran->hari_tanggal) }}">
                                            @error('hari_tanggal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('buku-pelanggaran-kelas.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
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

<script>
    // Fetch siswa berdasarkan kelas yang dipilih
    function fetchSiswa(kelasId) {
        let siswaSelect = document.getElementById('siswa_id');
        siswaSelect.innerHTML = '<option value="">Loading...</option>';
        fetch(`/get-siswa/${kelasId}`)
            .then(response => response.json())
            .then(data => {
                siswaSelect.innerHTML = '<option value="" selected disabled>Pilih Siswa</option>';
                data.forEach(siswa => {
                    let option = document.createElement('option');
                    option.value = siswa.id;
                    option.textContent = siswa.nama;
                    siswaSelect.appendChild(option);
                });
            })
            .catch(error => {
                siswaSelect.innerHTML = '<option value="">Error loading...</option>';
            });
    }

    // Fetch pelanggaran berdasarkan tipe pelanggaran yang dipilih
    function fetchPelanggaran(tipePelanggaranId) {
        let pelanggaranSelect = document.getElementById('pelanggaran_id');
        pelanggaranSelect.innerHTML = '<option value="">Loading...</option>';
        fetch(`/get-pelanggaran/${tipePelanggaranId}`)
            .then(response => response.json())
            .then(data => {
                pelanggaranSelect.innerHTML = '<option value="" selected disabled>Pilih Pelanggaran</option>';
                data.forEach(pelanggaran => {
                    let option = document.createElement('option');
                    option.value = pelanggaran.id;
                    option.textContent = pelanggaran.deskripsi;
                    pelanggaranSelect.appendChild(option);
                });
            })
            .catch(error => {
                pelanggaranSelect.innerHTML = '<option value="">Error loading...</option>';
            });
    }
</script>
