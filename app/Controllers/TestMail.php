<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class TestMail extends Controller
{

    public function index()
    {
        $to = 'alextanweichung@gmail.com';
        $subject = 'Account Activation';
        $message = 'Hi Hehe, <br><br>
        Thanks Your Account created successfully. Please click
        the below link to activate your account<br><br>
        <a href="' . base_url() . '/testmail/verify" target="_blank">Activate Now</a><br><br>
        Thanks<br>Team
        ';
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setSubject($subject);
        $email->setFrom('info@okok.in', 'Info');
        //$email->setBCC('somebcc@mail.com');
        //$email->setCC('somecc@mail.com');

        $email->setMessage($message);

        if ($email->send()) {
            echo "Account Create Successfully. Please activate your account";
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function verify()
    {
        echo "Account Verified";
    }
}
