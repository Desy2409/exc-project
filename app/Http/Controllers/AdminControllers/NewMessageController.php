<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewMessageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:web_admin');
    }

    public function index()
    {
        $newMessage = "Page des nouveaux messages";
        $messages = Contact::where('is_read', false)->where('is_delete', false)->orderBy('created_at', 'desc')->get();

        return view('admin.pages.new_messages', compact('newMessage', 'messages'));
    }

    // public function read(Request $request, $id){
    //     $contact = Contact::findOrFail($id);
    //     try {
    //         $contact->is_read=true;
    //         $contact->save();
    //     } catch (Exception $e) {
    //         Session::flash('danger',"Erreur survenue lors de la validation de lecture du message");
    //     }
    //     return back();
    // }

    public function delete(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        try {
            $contact->is_delete = true;
            $contact->save();
        } catch (Exception $e) {
            Session::flash('danger', "Erreur survenue lors de la suppression du nouveau message");
        }
        return back();
    }
}
