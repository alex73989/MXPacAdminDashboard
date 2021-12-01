<?php

namespace App\Controllers;
use App\Models\DashboardModel;

class AdminDashboard extends BaseController
{
    public $dashboardModel;
    
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        helper('form');
    }

    public function admin_dashboard_controller()
    {
        $uniid = session()->get('logged_user');
        $data = [
            'page_title' => 'Admin Dashboard',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
        ];

        return view('NavbarContent/admin_dashboard_view', $data);
    }
}
