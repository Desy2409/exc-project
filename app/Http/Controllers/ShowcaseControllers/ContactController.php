<?php

namespace App\Http\Controllers\ShowcaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewContactMessageNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $contactUs = "Page nous contacter";

        return view('showcase.pages.contact_us', compact('contactUs'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->person_type == "Personne physique") {
            $this->validate(
                $request,
                [
                    'last_name' => 'required|max:30',
                    'first_name' => 'required|max:100',
                    'email' => 'required|email',
                    'phone_number' => 'required',
                    'object' => 'required|max:150',
                    'message' => 'required|max:255',
                ],
                [
                    'last_name.required' => "Le champ nom est obligatoire.",
                    'last_name.max' => "Le champ nom ne doit pas dépasser 50 caractères.",
                    'first_name.required' => "Le champ prénom(s) est obligatoire.",
                    'first_name.max' => "Le champ prénom(s) ne doit pas dépasser 100 caractères.",
                    'email.required' => "Le champ email est obligatoire.",
                    'email.email' => "Le champ email est invalide (ex: email@email.com).",
                    'phone_number.required' => "Le champ numéro de téléphone est obligatoire.",
                    'object.required' => "Veuillez saisir l'objet du message.",
                    'object.max' => "L'objet du message ne doit pas dépasser 150 caractères.",
                    'message.required' => "Veuillez saisir le message à envoyer.",
                    'message.max' => "Le message ne doit pas dépasser 255 caractères.",
                ]
            );
        } elseif ($request->person_type == "Entreprise") {
            $this->validate(
                $request,
                [
                    'social_reason' => 'required|max:255',
                    'email' => 'required|email',
                    'phone_number' => 'required',
                    'object' => 'required|max:150',
                    'message' => 'required|max:255',
                ],
                [
                    'social_reason.required' => "Le champ raison sociale est obligatoire.",
                    'social_reason.max' => "Le champ raison sociale ne doit pas dépasser 255 caractères.",
                    'email.required' => "Le champ email est obligatoire.",
                    'email.email' => "Le champ email est invalide (ex: email@email.com).",
                    'phone_number.required' => "Le champ numéro de téléphone est obligatoire.",
                    'object.required' => "Veuillez saisir l'objet du message.",
                    'object.max' => "L'objet du message ne doit pas dépasser 150 caractères.",
                    'message.required' => "Veuillez saisir le message à envoyer.",
                    'message.max' => "Le message ne doit pas dépasser 255 caractères.",
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
            $contact->person_type = $request->person_type;
            if ($request->person_type == "Personne physique") {
                $contact->last_name = $request->last_name;
                $contact->first_name = $request->first_name;
                $contact->social_reason = null;
            } else {
                $contact->social_reason = $request->social_reason;
                $contact->last_name = null;
                $contact->first_name = null;
            }
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->object = $request->object;
            $contact->message = $request->message;
            $contact->save();

            $users = User::where('user_type', 'Admin')->get();
            Notification::send($users, new NewContactMessageNotification(Contact::latest()->first()));

            Session::flash('success', "Votre message a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger', "Une erreur est survenue lors de l'envoi du mail. Veuillez réessayer.");
        }
        return back();
    }
}
