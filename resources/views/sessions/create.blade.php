<x-layout bodyClass="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
    </div>
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image:url('assets/img/bg_smk.jpg');">
            <span class="mask bg-gradient-dark opacity-5"></span>
            <div class="container mt-4">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto mt-6">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-success shadow-success border-radius-xl py-3 pe-1">
                                    <h4 class="text-white font-weight-bold fs-3 text-center mt-0 mb-n1">SIPPS</h4>
                                    <h4 class="text-white font-weight-normal fs-5 text-center mb-0">SMKN 1 Tambang</h4>
                                </div>
                            </div>
                            <div class="card-body mt-4">
                                <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    @if (Session::has('status'))
                                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('status') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    <div class="form-group mb-3 mt-n3 ms-n3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 ms-n3 position-relative">
                                        <label for="password">Password <span></span></label>
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

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 my-4 mt-3 mb-2">Masuk</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.guest></x-footers.guest>
        </div>
    </main>
    @push('js')
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script>
        $(function() {
            var text_val = $(".input-group input").val();
            if (text_val === "") {
                $(".input-group").removeClass('is-filled');
            } else {
                $(".input-group").addClass('is-filled');
            }

            $('#togglePassword').on('click', function() {
                var passwordField = $('#password');
                var icon = $(this).find('i');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
    @endpush
</x-layout>
