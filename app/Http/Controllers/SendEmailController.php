<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    //
    public function send_mail_get($chemin, $titre, $email, $note)
    {
        //dd($chemin);
        $data["email"] = $email;
        $data["title"] = $titre;
        $data["body"] = $note;
 
        $files = [
            $chemin,
        ];

        //public_path('attachments/Image_1.jpeg'),
        //public_path('attachments/Laravel_8_pdf_Example.pdf'),

        //Mail::to($email)->send(new SignUp($data));
  
        Mail::send('mail.mail', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
            /*
            foreach ($files as $file){
                $message->attach($file);
            }*/
        });

        echo "successfully";
    }

    //




}
