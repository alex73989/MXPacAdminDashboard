<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\DashboardModel;

class canvasMove extends Controller
{
    public $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        helper('form');
    }

    public function canvasMove_controller()
    {

        $uniid = session()->get('logged_user');
        // $userdata = $this->dashboardModel->getLoggedInUserData($uniid);
        // print_r($userdata);
        $data = [
            'page_title' => 'Canvas Move',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
        ];

        return view('NavbarContent/canvasMove', $data);
    }
}