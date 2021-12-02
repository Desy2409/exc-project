<?php

namespace App\Http\Controllers\ShowcaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $faq = "Page FAQ";
        return view('showcase.pages.faq', compact('faq'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'person_type' => 'required',
                'question' => 'required',
            ],
            [
                'person_type.required' => "Dites-nous qui vous êtes.",
                'question.required' => "Veuillez saisir la question à envoyer.",
            ]
        );
        if ($request->person_type == "Personne physique") {
            $this->validate(
                $request,
                [
                    'last_name' => 'required|max:50',
                    'first_name' => 'required|max:100',
                    'email' => 'required|email',
                    'phone_number' => 'required',
                ],
                [
                    'last_name.required' => "Le champ nom est obligatoire.",
                    'last_name.max' => "Le champ nom ne doit pas dépasser 50 caractères.",
                    'first_name.required' => "Le champ prénom(s) est obligatoire.",
                    'first_name.max' => "Le champ prénom(s) ne doit pas dépasser 100 caractères.",
                    'email.required' => "Le champ email est obligatoire.",
                    'email.email' => "Le champ email est invalide (ex: email@email.com).",
                    'phone_number.required' => "Le champ numéro de téléphone est obligatoire.",
                ]
            );
        } elseif ($request->person_type == "Entreprise") {
            $this->validate(
                $request,
                [
                    'social_reason' => 'required|max:255',
                    'email' => 'required|email',
                    'phone_number' => 'required',
                ],
                [
                    'social_reason.required' => "Le champ raison sociale est obligatoire.",
                    'social_reason.max' => "Le champ raison sociale ne doit pas dépasser 255 caractères.",
                    'email.required' => "Le champ email est obligatoire.",
                    'email.email' => "Le champ email est invalide (ex: email@email.com).",
                    'phone_number.required' => "Le champ numéro de téléphone est obligatoire.",
                ]
            );
            // } elseif ($request->person_type == "Anonymat") {
        }
        // else {}

        try {
            $faq = new Faq();
            $faq->last_name = $request->last_name;
            $faq->first_name = $request->first_name;
            $faq->social_reason = $request->social_reason;
            $faq->phone_number = $request->phone_number;
            $faq->question = $request->question;
            $faq->person_type = $request->person_type;
            $faq->save();

            Session::flash('success', "Votre question a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger', "Une erreur est survenue lors de l'envoi de la question. Veuillez réessayer.");
        }
        return back();
    }
}
