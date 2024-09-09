<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="user-profile"></x-navbars.sidebar>
    <div class="main-content position-relative">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4 mb-4">
            <div class="page-header min-height-300 border-radius-xl mt-1"
                style="background-image: url('{{ asset('assets/img/bg_smk.jpg') }}');">
                <span class="mask  bg-gradient-success opacity-3"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            @php
                                $user = auth()->user();
                                $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($user->name);
                            @endphp
                            <img src="{{ $avatarUrl }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{ $user->roles->pluck('name')->implode(', ') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-1">Informasi Profil</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="alert alert-light alert-dismissible text-dark fade show" role="alert">
                            <span class="alert-icon align-middle">
                                <span class="material-icons text-md">thumb_up</span>
                            </span>
                            <strong>&nbsp;Berhasil&nbsp;-&nbsp;</strong>{{ session('status') }}
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action='{{ route('user-profile') }}'>
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control border border-2 p-2" value='{{ old('email', $user->email) }}'>
                                    @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name', $user->name) }}'>
                                    @error('name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn bg-gradient-success">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alert').fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        </script>
    </div>
</x-layout>
