@extends('layouts.auth')
@section('authenticate_title', 'Mot de passe oublié')

@section('authenticate_content')
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <h4 class="mt-2">
            <div>Vous avez oublié votre mot de passe ?</div>
            <span>Renseignez l'email pour le récupérer.</span>
        </h4>
        <div class="divider row"></div>
        <div>
            <form id="resetPasswordForm" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="">
                    <div class=" form-group row position-relative mb-3">
                        <div class="col-md-8">
                            <label for="id_email" class="form-label">Adresse email <span class="text-danger">*</span></label>
                            <input id="id_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Renseignez l'email de récupération de mot de passe...">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="divider row"></div>
                    <div class="d-flex align-items-center">
                        <div class="ms-auto">
                            <button class="btn btn-primary btn-sm">Envoyer le lien de réinitialisation de mot de passe</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#resetPasswordForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    email: {
                        required: "Veuillez entrer une adresse email.",
                        email: "L'adresse email saisie est invalide."
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
@endsection
