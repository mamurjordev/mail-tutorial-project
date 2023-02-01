<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mailsetting extends Controller
{
    public function Mailend(){

        $details = [
            'title' => 'Thans For Connect Mamurjor IT',
            'body' => 'hadijaman'
        ];
        $client='wordpresslearningbangladesh@gmail.com';
        $return="Mail Send Done Properly";
         $this->Mailsetting($details,$client);


         $admindetials = [
            'title' => 'Get One Conenct',
            'body' => 'hadijaman'
        ];
        $adminmail='monlinebatch@gmail.com';
        $return="Mail Send Done Properly";
         $this->Mailsetting($admindetials,$adminmail);

         return $return;
    }
}
