<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="siswa"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Edit Siswa"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Edit Siswa</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Lengkap&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="nis_nisn">NIS/NISN&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nis_nisn') is-invalid @enderror" id="nis_nisn" name="nis_nisn" value="{{ old('nis_nisn', $siswa->nis_nisn) }}">
                                            @error('nis_nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="jurusan_id">Jurusan&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id">
                                                <option value="" disabled>Pilih Jurusan</option>
                                                @foreach ($jurusan as $j)
                                                    <option value="{{ $j->id }}" {{ old('jurusan_id', $siswa->jurusan_id) == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('jurusan_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="kelas_id">Kelas&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id">
                                                <option value="" disabled>Pilih Kelas</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="gender_id">Gender&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('gender_id') is-invalid @enderror" id="gender_id" name="gender_id">
                                                <option value="" disabled>Pilih Gender</option>
                                                @foreach ($gender as $g)
                                                    <option value="{{ $g->id }}" {{ old('gender_id', $siswa->gender_id) == $g->id ? 'selected' : '' }}>{{ $g->jenis }}</option>
                                                @endforeach
                                            </select>
                                            @error('gender_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="agama_id">Agama&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('agama_id') is-invalid @enderror" id="agama_id" name="agama_id">
                                                <option value="" disabled>Pilih Agama</option>
                                                @foreach ($agama as $a)
                                                    <option value="{{ $a->id }}" {{ old('agama_id', $siswa->agama_id) == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $siswa->alamat) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $siswa->telepon) }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="status_dalam_keluarga">Status Dalam Keluarga</label>
                                            <select class="form-select" name="status_dalam_keluarga">
                                                <option value="" disabled>Pilih</option>
                                                <option value="Anak kandung" {{ old('status_dalam_keluarga', $siswa->status_dalam_keluarga) == 'Anak kandung' ? 'selected' : '' }}>Anak kandung</option>
                                                <option value="Anak angkat" {{ old('status_dalam_keluarga', $siswa->status_dalam_keluarga) == 'Anak angkat' ? 'selected' : '' }}>Anak angkat</option>
                                                <option value="Tinggal bersama wali" {{ old('status_dalam_keluarga', $siswa->status_dalam_keluarga) == 'Tinggal bersama wali' ? 'selected' : '' }}>Tinggal bersama wali</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="anak_ke">Anak Ke</label>
                                            <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="{{ old('anak_ke', $siswa->anak_ke) }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="nama_ayah">Nama Ayah</label>
                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah) }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="nama_ibu">Nama Ibu</label>
                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu) }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="alamat_orang_tua">Alamat Orang Tua</label>
                                            <textarea class="form-control" id="alamat_orang_tua" name="alamat_orang_tua">{{ old('alamat_orang_tua', $siswa->alamat_orang_tua) }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
                                    <button type="submit" class="btn btn-success mb-0 mt-3">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
