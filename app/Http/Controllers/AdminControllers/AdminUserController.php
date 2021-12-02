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
            Session::flash('success', "Enregistrement effectué avec succès.");
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
            Session::flash('success', "Modification effectuée avec succès.");
        } catch (Exception $e) {
            Session::flash('error', "Erreur survenue lors de la modification des informations de l'utilisateur.");
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            Session::flash('success', "Suppression effectée avec succès.");
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
                        'last_name.string' => "Le nom doit être une chaîne de caractères.",
                        'last_name.max' => "Le nom ne doit pas dépasser 30 caractères.",
                        'first_name.required' => "Veuillez renseigner au moins un prénom.",
                        'first_name.string' => "Le prénom doit être une chaîne de caractères.",
                        'first_name.max' => "Le prénom ne doit pas dépasser 100 caractères.",
                        'email.required' => "Veuillez entrer votre adresse email.",
                        'email.string' => "L'adresse email doit être une chaîne de caractères.",
                        'email.email' => "L'adresse email entrée est invalide.",
                        'password.required' => "Veuillez entrer votre mot de passe.",
                        'password.string' => "Le mot de passe doit être une chaîne de caractères.",
                        'password.min' => "Le mot de passe doit contenir au moins 8 caractères.",
                        'password.confirmed' => "Veuillez entrer le même mot de passe pour le confirmer.",
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
                                'civility.required' => "Veuillez choisir une civilité.",
                                'last_name.required' => "Veuillez renseigner votre nom.",
                                'last_name.string' => "Le nom doit être une chaîne de caractères.",
                                'last_name.max' => "Le nom ne doit pas dépasser 30 caractères.",
                                'first_name.required' => "Veuillez renseigner au moins un prénom.",
                                'first_name.string' => "Le prénom doit être une chaîne de caractères.",
                                'first_name.max' => "Le prénom ne doit pas dépasser 100 caractères.",
                                'email.required' => "Veuillez entrer votre adresse email.",
                                'email.string' => "L'adresse email doit être une chaîne de caractères.",
                                'email.email' => "L'adresse email entrée est invalide.",
                                'password.required' => "Veuillez entrer votre mot de passe.",
                                'password.string' => "Le mot de passe doit être une chaîne de caractères.",
                                'password.min' => "Le mot de passe doit contenir au moins 8 caractères.",
                                'password.confirmed' => "Veuillez entrer le même mot de passe pour le confirmer.",
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
                                'social_reason.string' => "La raison sociale doit être une chaîne de caractères.",
                                'social_reason.max' => "La raison sociale ne doit pas dépasser 255 caractères.",
                                'email.required' => "Veuillez entrer votre adresse email.",
                                'email.string' => "L'adresse email doit être une chaîne de caractères.",
                                'email.email' => "L'adresse email entrée est invalide.",
                                'password.required' => "Veuillez entrer votre mot de passe.",
                                'password.string' => "Le mot de passe doit être une chaîne de caractères.",
                                'password.min' => "Le mot de passe doit contenir au moins 8 caractères.",
                                'password.confirmed' => "Veuillez entrer le même mot de passe pour le confirmer.",
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
