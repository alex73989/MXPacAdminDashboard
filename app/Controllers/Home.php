<?php


namespace App\Controllers;
use App\Models\DashboardModel;


class Home extends BaseController
{
    public $dashboardModel;
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        helper('form');
    }

    public function home_controller()
    {
        $uniid = session()->get('logged_user');
        $data = [
            'page_title' => 'Home Page',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
        ];
        
        // $userdata = $this->dashboardModel->getLoggedInUserData($uniid);
        // print_r($userdata);
        //$data['userdata'] = $this->dashboardModel->getLoggedInUserData($uniid);

        return view('home', $data);
    }
}
