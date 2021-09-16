<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendContactMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'information' => 'required'
        ]);

        $subject = $request->name;

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'information' => $request->information,
        ];

        Mail::to('contact@visionintlpro.eu')->send(new Contact($details, $subject));
    }
}
