<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class TestAttachementController extends Controller
{
    
    public function send_mail(Request $request)
    {
        $data["email"] = "monlinebatch@gmail.com";
        $data["title"] = "hadi is a bad boy"; 
        $files = [
            public_path('attachment/hadi.jpg'),
            public_path('attachment/jaman.png'),
            public_path('attachment/web.txt'),            
        ];
  
        Mail::send('emails.testmail', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        });

        echo "kaj korceh!";
    }
}
