<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientFaqController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
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
                    'question' => 'required',
                ],
                [
                    'last_name.required' => "Le champ nom est obligatoire.",
                    'first_name.required' => "Le champ prénom(s) est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'question.required' => "Veuillez saisir la question à envoyer.",
                ]
            );
        } elseif ($request->person_type == "Personne morale") {
            $this->validate(
                $request,
                [
                    'social_reason' => 'required',
                    'phone_number' => 'required',
                    'question' => 'required',
                ],
                [
                    'social_reason.required' => "Le champ raison social est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'question.required' => "Veuillez saisir la question à envoyer.",
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
            $faq = new Faq();
            $faq->last_name = $request->last_name;
            $faq->first_name = $request->first_name;
            $faq->social_reason = $request->social_reason;
            $faq->phone_number = $request->phone_number;
            $faq->question = $request->question;
            $faq->save();

            Session::flash('success',"Votre question a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger',"Une erreur est survenue lors de l'envoi de la question. Veuillez réessayer.");
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        if ($request->person_type == "Personne physique") {
            $this->validate(
                $request,
                [
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'phone_number' => 'required',
                    'question' => 'required',
                ],
                [
                    'last_name.required' => "Le champ nom est obligatoire.",
                    'first_name.required' => "Le champ prénom(s) est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'question.required' => "Veuillez saisir la question à envoyer.",
                ]
            );
        } elseif ($request->person_type == "Personne morale") {
            $this->validate(
                $request,
                [
                    'social_reason' => 'required',
                    'phone_number' => 'required',
                    'question' => 'required',
                ],
                [
                    'social_reason.required' => "Le champ raison social est obligatoire.",
                    'phone_number.required' => "Vous devez renseigner un numéro de téléphone.",
                    'question.required' => "Veuillez saisir la question à envoyer.",
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
            $faq->last_name = $request->last_name;
            $faq->first_name = $request->first_name;
            $faq->social_reason = $request->social_reason;
            $faq->phone_number = $request->phone_number;
            $faq->question = $request->question;
            $faq->save();

            Session::flash('success',"Votre question a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger',"Une erreur est survenue lors de l'envoi du mail. Veuillez réessayer.");
        }
        return back();
    }
    public function destroy($id)
    {
    }
}
