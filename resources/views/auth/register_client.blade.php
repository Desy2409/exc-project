@extends('layouts.auth')
@section('authenticate_title', 'Inscription client')

@section('authenticate_content')
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9 mt-100 p-5">
        <div class="app-logo"></div>
        <h4 class="mt-2">
            <div>Vous êtes nouveau ?</div>
            <span>Créez votre compte et poursuivez.</span>
        </h4>
        <div class="divider row"></div>
        <div>
            <form id="registerForm" action="{{ route('register') }}" method="post">
                @csrf
                <input type="hidden" name="user_type" value="Client">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="radio" id="person" name="person_type" value="Personne physique" checked onchange="personChange(this)" {{ old('person_type') == 'Personne physique' ? 'checked' : '' }} class="form-check-input @error('person_type') is-invalid @enderror">
                            <label for="person" class="mb-1">Personne physique</label>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                            <input type="radio" id="company" name="person_type" value="Entreprise" onchange="personChange(this)" {{ old('person_type') == 'Entreprise' ? 'checked' : '' }} class="form-check-input @error('person_type') is-invalid @enderror">
                            <label for="company" class="mb-1">Entreprise</label>
                        </div>
                    </div>
                    <div class="col-lg-12 physic_person">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="radio" id="id_sir" name="civility" value="M." checked {{ old('civility') == 'M.' ? 'checked' : '' }} class="form-check-input @error('civility') is-invalid @enderror">
                                        <label for="id_sir" class="mb-1">M.</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="radio" id="id_mrs" name="civility" value="Mme" {{ old('civility') == 'Mme' ? 'checked' : '' }} class="form-check-input @error('civility') is-invalid @enderror">
                                        <label for="id_mrs" class="mb-1">Mme</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="radio" id="id_miss" name="civility" value="Mlle" {{ old('civility') == 'Mlle' ? 'checked' : '' }} class="form-check-input @error('civility') is-invalid @enderror">
                                        <label for="id_miss" class="mb-1">Mlle</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                        <input type="radio" id="id_orther" name="civility" value="Autre" {{ old('civility') == 'Autre' ? 'checked' : '' }} class="form-check-input @error('civility') is-invalid @enderror">
                                        <label for="id_orther" class="mb-1">Autre</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2 physic_person">
                        <div class="form-group">
                            <label for="id_last_name" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input id="id_last_name" class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" placeholder="Nom" value="{{ old('last_name') }}" />
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <em class="text-danger">{{ $message }}</em>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2 physic_person">
                        <div class="form-group">
                            <label for="id_first_name" class="form-label">Prénom(s) <span class="text-danger">*</span></label>
                            <input id="id_first_name" class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" placeholder="Prénom(s)" value="{{ old('first_name') }}" />
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <em class="text-danger">{{ $message }}</em>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 moral_person">
                        <div class="form-group">
                            <label for="id_social_reason" class="form-label">Raison sociale <span class="text-danger">*</span></label>
                            <input id="id_social_reason" class="form-control @error('social_reason') is-invalid @enderror" type="text" name="social_reason" placeholder="Raison sociale" value="{{ old('social_reason') }}" />
                            @error('social_reason')
                                <span class="invalid-feedback" role="alert">
                                    <em class="text-danger">{{ $message }}</em>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <div class="form-group">
                            <label for="id_email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input id="id_email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <em class="text-danger">{{ $message }}</em>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                            <label for="id_password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <input id="id_password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mot de passe" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <em class="text-danger">{{ $message }}</em>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                            <label for="id_password_confirmation" class="form-label">Confirmation de mot de passe <span class="text-danger">*</span></label>
                            <input id="id_password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirmation de mot de passe" />
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 mb-2">
                        <div class="form-group">

                        </div>
                    </div> --}}
                    <div class="divider row"></div>
                    <div class="d-flex align-items-center">
                        <div class="ms-auto">
                            <button type="submit" class="btn btn-sm btn-primary">S'inscrire</button>
                        </div>
                    </div>
                    <div class="text-center">
                        Vous avez déjà un compte ? &nbsp;<a href="{{ route('login') }}" class="text-decoration-none">Se connecter</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.physic_person').show();
        $('.moral_person').hide();

        function personChange(params) {
            var type = params.value
            if (type == "Personne physique") {
                // alert('Personne physique')
                $('.physic_person').show()
                $('.moral_person').hide()
            } else {
                // alert('Entreprise')
                $('.moral_person').show()
                $('.physic_person').hide()
            }
        }
    </script>

    <script>
        $(function() {
            $('#registerForm').validate({
                rules: {
                    last_name: {
                        required: true,
                        maxlength: 30,
                        // regex : "^[a-zA-Z'.\\s]"
                    },
                    first_name: {
                        required: true,
                        maxlength: 100,
                    },
                    social_reason: {
                        required: true,
                        maxlength: 255,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        // equalTo: '#password'
                    },
                },
                messages: {
                    last_name: {
                        required: "Veuillez entrer votre nom.",
                        maxlength: "Le nom ne doit pas dépasser 30 caractères.",
                        // regex:"Le nom doit être une chaîne de caractères."
                    },
                    first_name: {
                        required: "Veuillez entrer au moins un prénom.",
                        maxlength: "Le prénom ne doit pas dépasser 100 caractères.",
                    },
                    social_reason: {
                        required: "Veuillez entrer votre raison sociale.",
                        maxlength: "La raison sociale ne doit pas dépasser 255 caractères.",
                    },
                    email: {
                        required: "Veuillez entrer votre adresse email.",
                        email: "L'adresse email entrée est invalide (ex: email@email.com)."
                    },
                    password: {
                        required: "Veuillez entrer votre mot de passe.",
                        minlength: "Le mot de passe doit contenir au moins 8 caractères."
                    },
                    password_confirmation: {
                        required: "Veuillez confirmer votre mot de passe.",
                        minlength: "La confirmation de mot de passe doit contenir au moins 8 caractères.",
                        // equalTo: "Veuillez entrer le même mot de passe pour le confirmer."
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
