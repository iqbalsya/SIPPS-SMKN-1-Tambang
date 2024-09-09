<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="users"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Tambah User"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Tambah User</h4>
                            </div>
                        </div>
                        <div class="card-body px-4 pt-4 pb-2">

                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Role</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="siswa_id">Siswa (Jika user merupakan siswa)</label>
                                            <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Siswa</option>
                                                @foreach($siswas as $siswa)
                                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('siswa_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="guru_id">Guru (Jika user merupakan guru)</label>
                                            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Guru</option>
                                                @foreach($gurus as $guru)
                                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('guru_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                    
                                        <div class="form-group mb-3 position-relative">
                                            <label for="password">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                                <span class="position-absolute" style="top: 50%; right: 1rem; transform: translateY(-50%); cursor: pointer;" id="togglePassword">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group mb-3 position-relative">
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                                <span class="position-absolute" style="top: 50%; right: 1rem; transform: translateY(-50%); cursor: pointer;" id="togglePasswordConfirmation">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </divclass=>
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-2 px-4 me-2">Batal</a>
                                    <button type="submit" class="btn bg-gradient-success mb-2 px-4">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
            const passwordConfirmation = document.querySelector('#password_confirmation');

            togglePassword.addEventListener('click', function (e) {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // Toggle the icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            togglePasswordConfirmation.addEventListener('click', function (e) {
                // Toggle the type attribute
                const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmation.setAttribute('type', type);
                // Toggle the icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });

    </script>
</x-layout>
