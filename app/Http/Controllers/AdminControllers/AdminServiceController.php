<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $adminServices = "Page admin nos services";
        $services = Service::orderBy('title')->get();
        return view('admin.pages.services', compact('adminServices', 'services'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'title' => 'required|max:30|unique:services',
                'description' => 'required|max:255',
                'upload_file.*' => 'required|file|size:2048|mimes:jpg,png,jpeg,gif,svg,webp', //|file
            ],
            [
                'title.required' => "Le titre est obligatoire.",
                'title.max' => "Le titre ne doit pas dépasser 30 caractères.",
                'title.unique' => "Ce titre a déjà été ajouté.",
                'description.required' => "La description est obligatoire.",
                'description.max' => "La description  ne doit pas dépasser 255 caractères.",
                'upload_file.required' => "L'image est obligatoire.",
                'upload_file.file' => "L'image doit être un fichier.",
                'upload_file.size' => "La taille maximale de l'image est de : 2Mo.",
                'upload_file.mimes' => "Les formats d'image autorisés sont : jpg, png, jpeg, gif, svg et webp",
            ]
        );

        try {
            $service = new Service();
            $service->code = Str::random(20);
            $service->title = $request->title;
            $service->description = $request->description;
            if ($request->upload_file) {
                if($request->file_name){
                    $uploadFile = $request->file_name.'.'.$request->upload_file->getClientOriginalExtension();
                }else{
                    $uploadFile = $request->upload_file;
                }
                $service->upload_file = $uploadFile;
                $service->original_filename = $request->upload_file->getClientOriginalName();
                $path = $request->upload_file->storeAs('Nos services/', $uploadFile, 'public');
                $service->path = $path;
            }
            $service->save();

            Session::flash('success', "Votre question a été envoyé avec succès.");
        } catch (Exception $e) {
            Session::flash('danger', "Une erreur est survenue lors de l'envoi du mail. Veuillez réessayer.");
        }
        return back();
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
