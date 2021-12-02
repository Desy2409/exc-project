@extends('layouts.auth')
@section('authenticate_title', 'Connexion')

@section('authenticate_content')
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <h4 class="mt-2">
            <div>Heureux de vous revoir,</div>
            <span>Connectez-vous à votre compte pour continuer.</span>
        </h4>
        <div class="divider row"></div>
        <div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                {{-- <input type="hidden" name="user_type" value="Client"> --}}
                <div class="">
                    <div class=" form-group row position-relative">
                        <div class="col-md-6">
                            @if (Session::has('error'))
                                <div class=" alert altert-light text-center text-danger">
                                    <span class="text-danger p-0">{!! Session::pull('error') !!}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class=" form-group row position-relative mb-3">
                        <div class="col-md-6">
                            <label for="id_email" class="form-label">Adresse email <span class="text-danger">*</span></label>
                            <input id="id_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Saisissez votre adresse email...">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row position-relative mb-3">
                        <div class="col-md-6">
                            <label for="id_password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <input id="id_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Entrez votre mot de passe...">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row position-relative mb-2">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="id_remember" onchange="remeberChecked(this)" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="id_remember">
                                    Se souvenir de moi
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row position-relative mb-2">
                        <div class="col-md-6">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="divider row"></div>
                    <div class="d-flex align-items-center">
                        <div class="ms-auto">
                            <button type="submit" class="btn btn-primary btn-sm">Se connecter</button>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        Vous n'avez pas de compte ? &nbsp;<a href="{{ route('register') }}" class="text-decoration-none">S'inscrire</a>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                },
                messages: {
                    email: {
                        required: "Veuillez entrer une adresse email.",
                        email: "L'adresse email saisie est invalide."
                    },
                    password: {
                        required: "Veuillez entrer votre mot de passe.",
                        minlength: "Le mot de passe doit contenir au moins 8 caractères."
                    },
                },
                errorElement: 'em',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                // errorElement.
            });
        });
    </script>

    <script>
        function remeberChecked() {
            // var remember = document.getElementById('id_remember');
            // if (remember.value=="on") {
            //     remember.value=1;
            // }else{
            //     remember.value=0;
            // }
        }
    </script>
@endsection
