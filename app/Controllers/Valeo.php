<?php

namespace App\Controllers;
use App\Models\DashboardModel;
use App\Models\RegisterModel;

class Valeo extends BaseController
{
    public $dashboardModel;
    public $registerModel;
    
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->registerModel = new RegisterModel();
        helper('form');
        $validation =  \Config\Services::validation();
    }

    public function valeo_controller()
    {
        $uniid = session()->get('logged_user');
        $data = [
            'page_title' => 'Valeo',
            'userdata' => $this->dashboardModel->getLoggedInUserData(session()->get('logged_user')),
            'userAllData' => $this->dashboardModel->getAllUserData(),
            'validation' => null,
        ];

        return view('NavbarContent/valeo_view', $data);
    }

    public function insert()
    {
        
        // $uniid = session()->get('logged_user');
        $data = [
            'userdata' => $this->dashboardModel->getLoggedInUserData(session()->get('logged_user')),
        ];
        // print_r($data);
        if($this->request->isAJAX())
        {
            if ($this->request->getMethod() == 'post') {
                echo "ajax request";
                $rules = [
                    'employeeid' => 'required',
                    'username' => 'required|min_length[4]|max_length[20]',
                    'fullname' => 'required',
                    'email' => 'required|valid_email|is_unique[users_one.email]',
                    'pass' => 'required|min_length[6]|max_length[16]',
                    'mobile' => 'required|exact_length[10]|numeric',
                    'cardid' => 'required',
                    'usergroup' => 'required',
                    'groupdescription' => 'required',
                ];
                if($this->validate($rules))
                {
                    
                    $response = [
                        'success' => true,
                        'msg' => "User created",
                    ];
                }
                else 
                {
                    $response = [
                        'success' => false,
                        'msg' => "Failed to create user",
                    ];
                }
                    
                
                return $this->response->setJSON($response);
            }
        }
        else
        {
            echo "No direct script access allowed";
        }
    }
}