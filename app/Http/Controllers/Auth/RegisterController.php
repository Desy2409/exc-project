<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {
        $guard = session("auth");
        if ($guard == 'admin') {
            return route('admin.dashboard');
        } elseif ($guard == 'client') {
            return route('client.dashboard');
        }
    }

    protected function guard()
    {
        if (request()->user_type == 'Admin') {
            session(["auth" => "admin"]);
            return Auth::guard("admin");
        } else if (request()->user_type == 'Client') {
            session(["auth" => "client"]);
            return Auth::guard("client");
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd('register');
        if (isset($data['user_type'])) {
            // dd('$data[user_type]',$data['user_type']);
            if ($data['user_type'] == 'Admin') {
                // dd('Admin valiadtions');
                return Validator::make(
                    $data,
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
                if (isset($data['person_type'])) {
                    if ($data['person_type'] == 'Personne physique') {
                        return Validator::make(
                            $data,
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
                    } elseif ($data['person_type'] == 'Entreprise') {
                        return Validator::make(
                            $data,
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
                        return Validator::make($data, ['person_type' => 'required'], ['person_type.required' => "Veuillez choisir un type de personne."]);
                    }
                }
            }
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $lastUser = User::latest()->first();

        $user = new User();
        if (isset($data['user_type'])) {
            if ($data['user_type'] == 'Admin') {
                $user->name =  $data['first_name'].' '.$data['last_name'];
            } elseif ($data['user_type'] == 'Client') {
                if (isset($data['person_type'])) {
                    if ($data['person_type'] == 'Personne physique') {
                        // if ($data['civility'] == 'Autre') {
                        $user->name = $data['first_name'].' '.$data['last_name'];
                        // } else {
                        //     $user->name = $data['civility'] . ' ' . $data['last_name'] . ' ' . $data['first_name'];
                        // }
                    } elseif ($data['person_type'] == 'Entreprise') {
                        $user->name = $data['social_reason'];
                    }
                }
            }
        }
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->user_type = $data['user_type'];
        if ($lastUser) {
            $user->token = Crypt::encrypt($user->name . '@$@' . $lastUser->id + 1, '');
        } else {
            $user->token = Crypt::encrypt($user->name . '@$@' . 1, '');
        }
        $user->save();

        if (isset($data['user_type'])) {
            if ($data['user_type'] == 'Admin') {
                $administrator = new Administrator();
                $administrator->last_name = $data['last_name'];
                $administrator->first_name = $data['first_name'];
                $administrator->user_id = $user->id;
                $administrator->save();
            } else {
                if (isset($data['person_type'])) {
                    $client = new Client();
                    if ($data['person_type'] == 'Personne physique') {
                        $client->person_type = $data['person_type'];
                        $client->civility = $data['civility'];
                        $client->last_name = $data['last_name'];
                        $client->first_name = $data['first_name'];
                        $client->user_id = $user->id;
                        $client->save();
                    } elseif ($data['person_type'] == 'Entreprise') {
                        // $client = new Client();
                        $client->person_type = $data['person_type'];
                        $client->social_reason = $data['social_reason'];
                        $client->user_id = $user->id;
                        $client->save();
                    }
                }
            }
        }
        return $user;
    }
}
