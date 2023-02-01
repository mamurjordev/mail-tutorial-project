<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendMailController extends Controller
{
    public function send_mail(Request $request)
    {
        $data["email"] = "monlinebatch@gmail.com";
        $data["title"] = "mamurjor.com";
 
        $files = [
            public_path('attachments/hadi.jpg'),
            public_path('attachments/jaman.png'),
        ];
  
        Mail::send('emails.testmail', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        });

        echo "Mail send successfully !!";
    }
}