<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        if ($request->has('email')){
            $email = $request->get('email');
            $pass = Rand(100001,999999);

            $details=[
                'title'=>'Send User Password',
                'body'=>'Your Password is '.$pass,
            ];
            Mail::to($email)->send(new TestMail($details));
            return "Email Send";
        }
    }
}
