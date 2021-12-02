<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminFaqController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web_admin');
    }

    public function index()
    {
        $adminFaq = "Page admin FAQ";

        $faqs = Faq::orderBy('question')->get();
        return view('admin.pages.faq', compact('adminFaq', 'faqs'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'question' => 'required|max:255|unique:faqs',
                'response' => 'required',
            ],
            [
                'question.required' => "Veuillez saisir la question à envoyer.",
                'question.unique' => "Cette question a déjà été ajoutée.",
                'question.max' => "La question ne doit pas dépasser 255 caractères.",
                'response.required' => "Veuillez saisir la ou les réponse(s) à la question.",
            ]
        );

        try {
            $faq = new Faq();
            $faq->last_name = $request->last_name; //user()->last_name
            $faq->first_name = $request->first_name; //user()->first_name
            $faq->email = $request->email; //user()->email
            $faq->phone_number = $request->phone_number; //user()->phone_number
            $faq->question = $request->question;
            $faq->response = $request->response;
            $faq->person_type = "Administrateur";
            $faq->save();

            Session::flash('success', "Votre question a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger', "Une erreur est survenue lors de l'envoi de la question. Veuillez réessayer.");
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $this->validate(
            $request,
            [
                'question' => 'required|max:255',
                'response' => 'required',
            ],
            [
                'question.required' => "Veuillez saisir la question à envoyer.",
                'question.max' => "La question ne doit pas dépasser 255 caractères.",
                'response.required' => "Veuillez saisir la ou les réponse(s) à la question.",
            ]
        );

        $existingQuestions = Faq::where('question', $request->question)->get();
        // dd($existingQuestions);
        // dd($faq);
        // $existingQuestions = Faq::all();//where('question',$request->question)->get();
        // dd($existingQuestions);
        if (!empty($existingQuestions) && sizeof($existingQuestions) >= 1) {
            $this->validate(
                $request,
                [
                    'question' => 'unique:faqs',
                ],
                [
                    'question.unique' => "Cette question a déjà été ajoutée.",
                ]
            );

            // Session::flash('danger', "Cette question a déjà été ajoutée");
            // return back();
        }

        try {
            $faq->last_name = $request->last_name; //user()->last_name
            $faq->first_name = $request->first_name; //user()->first_name
            $faq->email = $request->email; //user()->email
            $faq->phone_number = $request->phone_number; //user()->phone_number
            $faq->question = $request->question;
            $faq->response = $request->response;
            $faq->person_type = "Administrateur";
            $faq->save();

            Session::flash('success', "Votre question a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger', "Une erreur est survenue lors de l'envoi du mail. Veuillez réessayer.");
        }
        return back();
    }
    public function destroy($id)
    {
    }
}
