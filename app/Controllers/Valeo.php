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
    }

    public function valeo_controller()
    {
        $uniid = session()->get('logged_user');
        $data = [
            'page_title' => 'Valeo',
            'userdata' => $this->dashboardModel->getLoggedInUserData(session()->get('logged_user')),
            'userAllData' => $this->dashboardModel->getAllUserData(),
        ];

        return view('NavbarContent/valeo_view', $data);
    }
}