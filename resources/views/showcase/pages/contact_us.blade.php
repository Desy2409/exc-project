@extends('showcase.layouts.app')
@section('page-title', 'Nous contacter')
@section('content-title', 'Nous contacter')
@section('breadcrumb', 'Nous contacter')
@section('header-script')
    <style>
        em {
            color: red;
            font-size: 11px;
        }

    </style>
@endsection

@section('page-content')
    <section class="uza-contact-area section-padding-80">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
                    <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4>Thank you for your interest. <br>Please fill out the form below to inquire about our work in Digital.</h4>
                        </div>
                        <form id="contactForm" action="{{ route('contact_us.store') }}" method="post">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-12 mb-3 text-center" style="color: blue">
                                    <span><em>Renseignez nom et prénom(s) si vous êtes une personne physique</em></span>
                                </div> --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="radio" id="person" name="person_type" value="Personne physique" checked onchange="personChange(this)" {{ old('person_type') == 'Personne physique' ? 'checked' : '' }} class="@error('person_type') is-invalid @enderror" style="width: 8%">
                                        <label for="person" class="mb-5">Personne physique</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="radio" id="company" name="person_type" value="Entreprise" onchange="personChange(this)" {{ old('person_type') == 'Entreprise' ? 'checked' : '' }} class="@error('person_type') is-invalid @enderror" style="width: 8%">
                                        <label for="company">Entreprise</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 physic_person">
                                    <div class="form-group">
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Nom">
                                        @error('last_name')
                                            <span class="invalid-feedback mb-30" role="alert">
                                                <em style="color:red; font-size:12px">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 physic_person">
                                    <div class="form-group">
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Prénom(s)">
                                        @error('first_name')
                                            <span class="invalid-feedback mb-30" role="alert">
                                                <em style="color:red; font-size:12px">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-12 mb-3 text-center" style="color: blue">
                                    <span><em>Renseignez la raison sociale si vous êtes une société</em></span>
                                </div> --}}
                                <div class="col-12 moral_person">
                                    <div class="form-group">
                                        <input type="text" name="social_reason" value="{{ old('social_reason') }}" class="form-control @error('social_reason') is-invalid @enderror" placeholder="Raison sociale">
                                        @error('social_reason')
                                            <span class="invalid-feedback mb-30" role="alert">
                                                <em style="color:red; font-size:12px">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback mb-30" role="alert">
                                                <em style="color:red; font-size:12px">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="N° Téléphone">
                                        @error('phone_number')
                                            <span class="invalid-feedback mb-30" role="alert">
                                                <em style="color:red; font-size:12px">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <em style="color:red; font-size:12px">{{ $message }}</em>
                                            </span>
                                        @enderror
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="8" cols="80" placeholder="Message">{!! old('message', '') !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn uza-btn btn-3 mt-5">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="contact-sidebar-area mb-80">

                        <div class="single-contact-card mb-50">
                            <h4>Contact Us</h4>
                            <h3>(+65) 1234 5678</h3>
                            <h6><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="650d0009090a4b060a090a17090c07250208040c094b060a08">[email&#160;protected]</a></h6>
                            <h6>Mon - Fri: 9:00 - 19:00 <br>Closed on Weekends</h6>
                        </div>

                        <div class="single-contact-card mb-50">
                            <h4>London</h4>
                            <h3>(+65) 2222 5678</h3>
                            <h6>49 Charing Cross Rd, London, UK <br><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d6beb3babab9f8b5b9bab9a4babfb496b1bbb7bfbaf8b5b9bb">[email&#160;protected]</a></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12">
                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11956.9355465873!2d24.0768412544878!3d56.9550599906977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2z4Kaw4Ka_4KaX4Ka-LCDgprLgp43gpq_gpr7gpp_gp43gpq3gpr_gpoY!5e0!3m2!1sbn!2sbd!4v1543911160102" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            $('#contactForm').validate({
                rules: {
                    last_name: {
                        required: true,
                        maxlength: 30,
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
                    },
                    phone_number: {
                        required: true,
                    },
                    message: {
                        required: true,
                    },
                },
                messages: {
                    last_name: {
                        required: "Le champ nom est obligatoire.",
                        maxlength: "Le champ nom ne doit pas dépasser 30 caractères."
                    },
                    first_name: {
                        required: "Le champ prénom(s) est obligatoire.",
                        maxlength: "Le champ prénom(s) ne doit pas dépasser 100 caractères."
                    },
                    social_reason: {
                        required: "Le champ raison sociale est obligatoire.",
                        maxlength: "Le champ raison sociale ne doit pas dépasser 255 caractères."
                    },
                    email: {
                        required: "Le champ email est obligatoire.",
                        email: "Lfrefferfreferfeépasser 255 caractères."
                    },
                    phone_number: {
                        required: "Le champ numéro de téléphone est obligatoire.",
                    },
                    message: {
                        required: "Veuillez saisir le message à envoyer.",
                    },
                },
                errorElement: 'em',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback text-danger');
                    element.closest('.form-group').append(error);
                },
                // errorElement.
            });
        });
    </script>
@endsection
