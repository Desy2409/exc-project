<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Client;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function index($userType)
    {
        if ($userType == 'clients') {
            $client = "Page de configuration de clients";
            $clients = Client::with('user')->get();

            return view('', compact('client', 'clients'));
        } elseif ($userType == 'administrators') {
            $administrator = "Page de configuration d'administrateurs";
            $administrators = Administrator::with('user')->get();
            
            return view('', compact('administrator', 'administrators'));
        }
    }

    public function store(Request $request)
    {
        $this->validation($request);

        try {
            $lastUser = User::latest()->first();

            $user = new User();
            if (isset($request->user_type)) {
                if ($request->user_type == 'Admin') {
                    $user->name = $request->last_name . ' ' . $request->first_name;
                } elseif ($request->user_type == 'Client') {
                    if (isset($request->person_type)) {
                        if ($request->person_type == 'Personne physique') {
                            if ($request->civility == 'Autre') {
                                $user->name = $request->last_name . ' ' . $request->first_name;
                            } else {
                                $user->name = $request->civility . ' ' . $request->last_name . ' ' . $request->first_name;
                            }
                        } elseif ($request->person_type == 'Entreprise') {
                            $user->name = $request->social_reason;
                        }
                    }
                }
            }

            if ($lastUser) {
                $user->token = Crypt::encrypt($user->name . '@$@' . $lastUser->id + 1, '');
            } else {
                $user->token = Crypt::encrypt($user->name . '@$@' . 1, '');
            }

            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if (isset($request->user_type)) {
                if ($request->user_type == 'Admin') {
                    $administrator = new Administrator();
                    $administrator->last_name = $request->last_name;
                    $administrator->first_name = $request->first_name;
                    $administrator->user_id = $user->id;
                    $administrator->save();
                } else {
                    if (isset($request->person_type)) {
                        if ($request->person_type == 'Personne physique') {
                            $client = new Client();
                            $client->person_type = $request->person_type;
                            $client->civility = $request->civility;
                            $client->last_name = $request->last_name;
                            $client->first_name = $request->first_name;
                            $client->user_id = $user->id;
                            $client->save();
                        } elseif ($request->person_type == 'Entreprise') {
                            $client = new Client();
                            $client->person_type = $request->person_type;
                            $client->social_reason = $request->social_reason;
                            $client->user_id = $user->id;
                            $client->save();
                        }
                    }
                }
            }
            Session::flash('success', "Enregistrement effectu?? avec succ??s.");
        } catch (Exception) {
            Session::flash('error', "Erreur survenue lors de l'enregistrement de l'utilisateur.");
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validation($request);

        try {
            if (isset($request->user_type)) {
                if ($request->user_type == 'Admin') {
                    $user->name = $request->last_name . ' ' . $request->first_name;
                } elseif ($request->user_type == 'Client') {
                    if (isset($request->person_type)) {
                        if ($request->person_type == 'Personne physique') {
                            if ($request->civility == 'Autre') {
                                $user->name = $request->last_name . ' ' . $request->first_name;
                            } else {
                                $user->name = $request->civility . ' ' . $request->last_name . ' ' . $request->first_name;
                            }
                        } elseif ($request->person_type == 'Entreprise') {
                            $user->name = $request->social_reason;
                        }
                    }
                }
            }
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->token = Crypt::encrypt($user->name . '@$@' . $user->id, '');
            $user->save();

            $administrator = $user ? $user->administrator : null;
            $client = $user ? $user->client : null;

            if ($user->administrator) {
                $administrator->last_name = $request->last_name;
                $administrator->first_name = $request->first_name;
                $administrator->user_id = $user->id;
                $administrator->save();
            } elseif ($user->client) {
                if ($user->client->person_type == "Personne physique") {
                    $client->person_type = $request->person_type;
                    $client->civility = $request->civility;
                    $client->last_name = $request->last_name;
                    $client->first_name = $request->first_name;
                    $client->user_id = $user->id;
                    $client->save();
                } elseif ($user->client->person_type == "Entreprise") {
                    $client->person_type = $request->person_type;
                    $client->social_reason = $request->social_reason;
                    $client->user_id = $user->id;
                    $client->save();
                }
            }
            Session::flash('success', "Modification effectu??e avec succ??s.");
        } catch (Exception $e) {
            Session::flash('error', "Erreur survenue lors de la modification des informations de l'utilisateur.");
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            Session::flash('success', "Suppression effect??e avec succ??s.");
        } catch (Exception $e) {
            Session::flash('error', "Erreur survenue lors de la suppression.");
        }
    }

    public function validation(Request $request)
    {
        if (isset($request->user_type)) {
            // dd('$data[user_type]',$request->user_type);
            if ($request->user_type == 'Admin') {
                // dd('Admin valiadtions');
                return Validator::make(
                    $request,
                    [
                        'last_name' => 'required|string|max:30',
                        'first_name' => 'required|string|max:100',
                        'email' => 'required|email',
                        'password' => 'required|string|min:8|confirmed'
                    ],
                    [
                        'last_name.required' => "Veuillez renseigner votre nom.",
                        'last_name.string' => "Le nom doit ??tre une cha??ne de caract??res.",
                        'last_name.max' => "Le nom ne doit pas d??passer 30 caract??res.",
                        'first_name.required' => "Veuillez renseigner au moins un pr??nom.",
                        'first_name.string' => "Le pr??nom doit ??tre une cha??ne de caract??res.",
                        'first_name.max' => "Le pr??nom ne doit pas d??passer 100 caract??res.",
                        'email.required' => "Veuillez entrer votre adresse email.",
                        'email.string' => "L'adresse email doit ??tre une cha??ne de caract??res.",
                        'email.email' => "L'adresse email entr??e est invalide.",
                        'password.required' => "Veuillez entrer votre mot de passe.",
                        'password.string' => "Le mot de passe doit ??tre une cha??ne de caract??res.",
                        'password.min' => "Le mot de passe doit contenir au moins 8 caract??res.",
                        'password.confirmed' => "Veuillez entrer le m??me mot de passe pour le confirmer.",
                    ]
                );
            } else {
                if (isset($request->person_type)) {
                    if ($request->person_type == 'Personne physique') {
                        return Validator::make(
                            $request,
                            [
                                'civility' => 'required',
                                'last_name' => 'required|string|max:30',
                                'first_name' => 'required|string|max:100',
                                'email' => 'required|email',
                                'password' => 'required|string|min:8|confirmed'
                            ],
                            [
                                'civility.required' => "Veuillez choisir une civilit??.",
                                'last_name.required' => "Veuillez renseigner votre nom.",
                                'last_name.string' => "Le nom doit ??tre une cha??ne de caract??res.",
                                'last_name.max' => "Le nom ne doit pas d??passer 30 caract??res.",
                                'first_name.required' => "Veuillez renseigner au moins un pr??nom.",
                                'first_name.string' => "Le pr??nom doit ??tre une cha??ne de caract??res.",
                                'first_name.max' => "Le pr??nom ne doit pas d??passer 100 caract??res.",
                                'email.required' => "Veuillez entrer votre adresse email.",
                                'email.string' => "L'adresse email doit ??tre une cha??ne de caract??res.",
                                'email.email' => "L'adresse email entr??e est invalide.",
                                'password.required' => "Veuillez entrer votre mot de passe.",
                                'password.string' => "Le mot de passe doit ??tre une cha??ne de caract??res.",
                                'password.min' => "Le mot de passe doit contenir au moins 8 caract??res.",
                                'password.confirmed' => "Veuillez entrer le m??me mot de passe pour le confirmer.",
                            ]
                        );
                    } elseif ($request->person_type == 'Entreprise') {
                        return Validator::make(
                            $request,
                            [
                                'social_reason' => 'required|string|max:255',
                                'email' => 'required|email',
                                'password' => 'required|string|min:8|confirmed'
                            ],
                            [
                                'social_reason.required' => "Veuillez renseigner votre raison sociale.",
                                'social_reason.string' => "La raison sociale doit ??tre une cha??ne de caract??res.",
                                'social_reason.max' => "La raison sociale ne doit pas d??passer 255 caract??res.",
                                'email.required' => "Veuillez entrer votre adresse email.",
                                'email.string' => "L'adresse email doit ??tre une cha??ne de caract??res.",
                                'email.email' => "L'adresse email entr??e est invalide.",
                                'password.required' => "Veuillez entrer votre mot de passe.",
                                'password.string' => "Le mot de passe doit ??tre une cha??ne de caract??res.",
                                'password.min' => "Le mot de passe doit contenir au moins 8 caract??res.",
                                'password.confirmed' => "Veuillez entrer le m??me mot de passe pour le confirmer.",
                            ]
                        );
                    } else {
                        return Validator::make($request, ['person_type' => 'required'], ['person_type.required' => "Veuillez choisir un type de personne."]);
                    }
                }
            }
        }
    }
}
