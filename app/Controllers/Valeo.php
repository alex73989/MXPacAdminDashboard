<?php

namespace App\Controllers;
use App\Models\DashboardModel;

class Valeo extends BaseController
{
    public $dashboardModel;
    
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
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

    public function insert(){
        
        // $uniid = session()->get('logged_user');
        $data = [
            'userdata' => $this->dashboardModel->getLoggedInUserData(session()->get('logged_user')),
        ];
        // print_r($data);
        if($this->request->isAJAX()){
            $validation->setRule('employeeid', 'EmployeeId', 'required');
        }
        else{
            echo "No direct script access allowed";
        }
    }
}