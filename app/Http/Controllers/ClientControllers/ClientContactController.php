<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientContactController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        // return view('showcase.pages.contact_us');
    }

    public function store(Request $request)
    {
        if ($request->person_type == "Personne physique") {
            $this->validate(
                $request,
                [
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'phone_number' => 'required',
                    'message' => 'required',
                ],
                [
                    'last_name.required' => "Le champ nom est obligatoire.",
                    'first_name.required' => "Le champ prénom(s) est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'message.required' => "Veuillez saisir le message à envoyer.",
                ]
            );
        } elseif ($request->person_type == "Personne morale") {
            $this->validate(
                $request,
                [
                    'social_reason' => 'required',
                    'phone_number' => 'required',
                    'message' => 'required',
                ],
                [
                    'social_reason.required' => "Le champ raison social est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'message.required' => "Veuillez saisir le message à envoyer.",
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'person_type' => 'required'
                ],
                [
                    'person_type.required' => "Veuillez choisir un type de personne."
                ]
            );
        }

        try {
            $contact = new Contact();
            $contact->last_name = $request->last_name;
            $contact->first_name = $request->first_name;
            $contact->social_reason = $request->social_reason;
            $contact->phone_number = $request->phone_number;
            $contact->message = $request->message;
            $contact->save();

            Session::flash('success',"Votre message a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger',"Une erreur est survenue lors de l'envoi du mail. Veuillez réessayer.");
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        if ($request->person_type == "Personne physique") {
            $this->validate(
                $request,
                [
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'phone_number' => 'required',
                    'message' => 'required',
                ],
                [
                    'last_name.required' => "Le champ nom est obligatoire.",
                    'first_name.required' => "Le champ prénom(s) est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'message.required' => "Veuillez saisir le message à envoyer.",
                ]
            );
        } elseif ($request->person_type == "Personne morale") {
            $this->validate(
                $request,
                [
                    'social_reason' => 'required',
                    'phone_number' => 'required',
                    'message' => 'required',
                ],
                [
                    'social_reason.required' => "Le champ raison social est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'message.required' => "Veuillez saisir le message à envoyer.",
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'person_type' => 'required'
                ],
                [
                    'person_type.required' => "Veuillez choisir un type de personne."
                ]
            );
        }

        try {
            $contact->last_name = $request->last_name;
            $contact->first_name = $request->first_name;
            $contact->social_reason = $request->social_reason;
            $contact->phone_number = $request->phone_number;
            $contact->message = $request->message;
            $contact->save();

            Session::flash('success',"Votre message a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger',"Une erreur est survenue lors de l'envoi du mail. Veuillez réessayer.");
        }
        return back();
    }

    public function destroy($id)
    {
        
    }
}
