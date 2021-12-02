@component('mail::message')
    # Bonjour {{ $user->client->first_name }},

    Votre compte a été créé avec succès. Vous pouvez dès à 
    présent bénéficier des services d'Express Coursier.

    Cordialement,
    L'équipe d'Express Coursier
@endcomponent
