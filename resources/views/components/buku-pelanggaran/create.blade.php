<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="buku-pelanggaran"></x-navbars.sidebar>
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
                                <h6 class="text-white text-capitalize ps-3">Tambah Pelanggaran</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('buku-pelanggaran.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        @if ($siswa)
                                            <div class="form-group mb-3">
                                                <label for="kelas_id">Kelas&nbsp;<span class="text-danger">*</span></label>
                                                <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" readonly>
                                                    <option value="{{ $siswa->kelas->id }}">{{ $siswa->kelas->nama }}</option>
                                                </select>
                                                @error('kelas_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="siswa_id">Siswa&nbsp;<span class="text-danger">*</span></label>
                                                <select class="form-select @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id" readonly>
                                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                                </select>
                                                @error('siswa_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @else
                                            <div class="form-group mb-3">
                                                <label for="kelas_id">Kelas&nbsp;<span class="text-danger">*</span></label>
                                                <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" onchange="fetchSiswa(this.value)">
                                                    <option value="" selected disabled>Pilih Kelas</option>
                                                    @foreach ($kelas as $kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
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
                                                </select>
                                                @error('siswa_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tipe_pelanggaran_id">Tipe Pelanggaran&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('tipe_pelanggaran_id') is-invalid @enderror" id="tipe_pelanggaran_id" name="tipe_pelanggaran_id" onchange="fetchPelanggaran(this.value)">
                                                <option value="" selected disabled>Pilih Tipe Pelanggaran</option>
                                                @foreach ($tipePelanggaran as $tp)
                                                    <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
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
                                            <label for="guru_id">Guru&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('guru_id') is-invalid @enderror" id="guru_id" name="guru_id">
                                                <option value="" selected disabled>Pilih Guru</option>
                                                @foreach ($gurus as $guru)
                                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
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
                                            <input type="date" class="form-control @error('hari_tanggal') is-invalid @enderror" id="hari_tanggal" name="hari_tanggal" value="{{ old('hari_tanggal') }}">
                                            @error('hari_tanggal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('buku-pelanggaran.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
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
    function fetchSiswa(kelasId) {
        // Fetch siswa based on the selected kelas
        fetch(`/get-siswa/${kelasId}`)
            .then(response => response.json())
            .then(data => {
                let siswaSelect = document.getElementById('siswa_id');
                siswaSelect.innerHTML = '<option value="" selected disabled>Pilih Siswa</option>';
                data.forEach(siswa => {
                    let option = document.createElement('option');
                    option.value = siswa.id;
                    option.textContent = siswa.nama;
                    siswaSelect.appendChild(option);
                });
            });
    }

    function fetchPelanggaran(tipePelanggaranId) {
        // Fetch pelanggaran based on the selected tipe pelanggaran
        fetch(`/get-pelanggaran/${tipePelanggaranId}`)
            .then(response => response.json())
            .then(data => {
                let pelanggaranSelect = document.getElementById('pelanggaran_id');
                pelanggaranSelect.innerHTML = '<option value="" selected disabled>Pilih Pelanggaran</option>';
                data.forEach(pelanggaran => {
                    let option = document.createElement('option');
                    option.value = pelanggaran.id;
                    option.textContent = pelanggaran.deskripsi; // Menggunakan deskripsi bukan nama
                    pelanggaranSelect.appendChild(option);
                });
            });
    }
</script>
