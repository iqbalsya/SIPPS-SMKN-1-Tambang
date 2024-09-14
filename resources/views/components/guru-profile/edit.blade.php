<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="guru"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Edit Guru"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Edit Guru</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('guru.profileupdate', $guru->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="foto">Foto Guru</label>
                                            @if ($guru->foto)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" class="img-thumbnail" style="max-width: 150px;">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tugas_tambahan">Tugas Tambahan</label>
                                            <input type="text" class="form-control" id="tugas_tambahan" name="tugas_tambahan" value="{{ old('tugas_tambahan', $guru->tugas_tambahan) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Lengkap&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $guru->nama) }}">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="gender_id">Gender&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('gender_id') is-invalid @enderror" id="gender_id" name="gender_id">
                                                <option value="" selected disabled>Pilih Gender</option>
                                                @foreach($genders as $gender)
                                                <option value="{{ $gender->id }}" {{ old('gender_id', $guru->gender_id) == $gender->id ? 'selected' : '' }}>{{ $gender->jenis }}</option>
                                                @endforeach
                                            </select>
                                            @error('gender_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nip_nuptk">NIP/NUPTK&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nip_nuptk') is-invalid @enderror" id="nip_nuptk" name="nip_nuptk" value="{{ old('nip_nuptk', $guru->nip_nuptk) }}">
                                            @error('nip_nuptk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $guru->telepon) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pangkat_gol_jabatan">Pangkat/Gol. Jabatan</label>
                                            <input type="text" class="form-control" id="pangkat_gol_jabatan" name="pangkat_gol_jabatan" value="{{ old('pangkat_gol_jabatan', $guru->pangkat_gol_jabatan) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $guru->alamat) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mt-n4">
                                            <label for="agama_id">Agama&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-select @error('agama_id') is-invalid @enderror" id="agama_id" name="agama_id">
                                                <option value="" selected disabled>Pilih Agama</option>
                                                @foreach($agamas as $agama)
                                                    <option value="{{ $agama->id }}" {{ old('agama_id', $guru->agama_id) == $agama->id ? 'selected' : '' }}>{{ $agama->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('agama_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('guru.profile') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
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
