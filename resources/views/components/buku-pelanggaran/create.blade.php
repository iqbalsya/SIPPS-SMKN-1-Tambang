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
                                <h4 class="text-white text-capitalize ps-3">Tambah Pelanggaran</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('buku-pelanggaran.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- If the class and student are already available -->
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

                                            <!-- Automatically fetch the wali kelas -->
                                            <div class="form-group mb-3">
                                                <label for="guru_id">Wali Kelas&nbsp;<span class="text-danger">*</span></label>
                                                <select class="form-select @error('guru_id') is-invalid @enderror" id="guru_id" name="guru_id" readonly>
                                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                                </select>
                                                @error('guru_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @else
                                            <!-- Pre-fill the class based on logged-in teacher -->
                                            <div class="form-group mb-3">
                                                <label for="kelas_id">Kelas&nbsp;<span class="text-danger">*</span></label>
                                                <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" {{ $kelas ? 'readonly' : '' }}>
                                                    @if($kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                                    @else
                                                        <option value="" selected disabled>Pilih Kelas</option>
                                                        @foreach ($allKelas as $kls)
                                                            <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                                        @endforeach
                                                    @endif
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

                                            <div class="form-group mb-3">
                                                <label for="guru_id">Wali Kelas&nbsp;<span class="text-danger">*</span></label>
                                                <select class="form-select @error('guru_id') is-invalid @enderror" id="guru_id" name="guru_id" readonly>
                                                    @if($guru)
                                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                                    @endif
                                                </select>
                                                @error('guru_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Tipe Pelanggaran and Pelanggaran Section -->
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
    if (document.getElementById('kelas_id').value) {
        fetchSiswa(document.getElementById('kelas_id').value);
        fetchGuru(document.getElementById('kelas_id').value);
    }

    function fetchSiswa(kelasId) {
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

    function fetchGuru(kelasId) {
        fetch(`/get-guru/${kelasId}`)
            .then(response => response.json())
            .then(data => {
                let guruSelect = document.getElementById('guru_id');
                guruSelect.innerHTML = '<option value="" selected disabled>Pilih Guru</option>';
                if (data) {
                    let option = document.createElement('option');
                    option.value = data.guru_id;
                    option.textContent = data.guru_nama;
                    guruSelect.appendChild(option);
                    guruSelect.value = data.guru_id; 
                }
            })
            .catch(error => {
                console.error('Error fetching guru:', error);
            });
    }

    document.getElementById('kelas_id').addEventListener('change', function() {
        const kelasId = this.value;
        fetchSiswa(kelasId);
        fetchGuru(kelasId); 
    });

    function fetchPelanggaran(tipePelanggaranId) {
        fetch(`/get-pelanggaran/${tipePelanggaranId}`)
            .then(response => response.json())
            .then(data => {
                let pelanggaranSelect = document.getElementById('pelanggaran_id');
                pelanggaranSelect.innerHTML = '<option value="" selected disabled>Pilih Pelanggaran</option>';
                data.forEach(pelanggaran => {
                    let option = document.createElement('option');
                    option.value = pelanggaran.id;
                    option.textContent = pelanggaran.deskripsi;
                    pelanggaranSelect.appendChild(option);
                });
            });
    }
</script>
