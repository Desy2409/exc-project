<?php

use App\Models\Contact;

if (!function_exists('allMessages')) {
    function allMessages()
    {
        return count(Contact::all());
    }
}

if (!function_exists('newMessages')) {
    function newMessages()
    {
        return count(Contact::where('is_read', false)->where('is_delete', false)->get());
    }
}

if (!function_exists('oldMessages')) {
    function oldMessages()
    {
        return count(Contact::where('is_read', true)->where('is_delete', false)->get());
    }
}

if (!function_exists('basketMessages')) {
    function basketMessages()
    {
        return count(Contact::where('is_delete', true)->get());
    }
}

if (!function_exists('fiveRecentMessages')) {
    function fiveRecentMessages()
    {
        return Contact::where('is_read', false)->where('is_delete', false)->orderBy('created_at', 'desc')->take(5)->get();
    }
}

if (!function_exists('readMessage')) {
    function readMessage($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->is_read = true;
        $contact->save();
        return $contact;
        // return Contact::where('is_read', false)->where('is_delete', false)->orderBy('created_at', 'desc')->get();
    }
}

// if (!function_exists('deleteMessage')) {
//     function deleteMessage($id)
//     {
//         $contact = Contact::findOrFail($id);
//         $contact->is_delete = true;
//         $contact->save();
//         return $contact;
//         // return Contact::where('is_read', false)->where('is_delete', false)->orderBy('created_at', 'desc')->get();
//     }
// }
