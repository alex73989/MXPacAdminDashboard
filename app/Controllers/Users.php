<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class Users extends Controller
{
    public function __construct()
    {
        helper("form");
    }
    public function index()
    {
        $data = [];
        /*$rules = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric|exact_length[10]',
        ];*/

        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Required',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Required',
                    'valid_email' => 'Enter valid Email Format OI',
                ],
            ],
            'mobile' => [
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => 'Enter Mobile Number pls',
                    'numeric' => 'Why ur field inside got other than number eh word leh',
                    'exact_length' => 'Mobile {value} shl contains exactly {param} digits'
                ],
            ],
        ];

        /*if($this->validate($rules))
        {
            //Ready To Save
            echo "Ready to Save";
        }
        else
        {
            $data['validation'] = $this->validator;
        }*/

        if($this->request->getMethod() == 'post')
        {
            if($this->validate($rules))
            {
                //Ready To Save
                echo "Ready to Save";
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view("myform", $data);
    }
}