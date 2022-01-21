<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store()
    {
        $contact = new Contact;

        $contact->name = request("name");
        $contact->email = request("email");
        $contact->subject = request("subject");
        $contact->message = request("message");
    
        $contact->save();
    }
}
