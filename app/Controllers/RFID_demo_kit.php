<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\DashboardModel;
use App\Libraries\PhpSerial;

class RFID_demo_kit extends Controller
{
    public $dashboardModel;
    public $PhpSerial;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        
        helper('form');
    }

    public function RFID_demo_kit_controller()
    {

        $uniid = session()->get('logged_user');
        // $userdata = $this->dashboardModel->getLoggedInUserData($uniid);
        // print_r($userdata);
        $data = [
            'page_title' => 'RFID Demo Kit',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
        ];

        return view('NavbarContent/rfid_demokit_view', $data);
    }

    public function RFID_canvasMove_controller()
    {

        $uniid = session()->get('logged_user');
        // $userdata = $this->dashboardModel->getLoggedInUserData($uniid);
        // print_r($userdata);
        $data = [
            'page_title' => 'RFID Canvas Move',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
        ];

        return view('NavbarContent/rfid_canvasMove', $data);
    }

    public function RFID_scan_tag_controller()
    {

        $uniid = session()->get('logged_user');
        // $userdata = $this->dashboardModel->getLoggedInUserData($uniid);
        // print_r($userdata);
        $data = [
            'page_title' => 'RFID Scan Tag',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
            'serial' => $this->PhpSerial = new PhpSerial(),
        ];

        return view('NavbarContent/rfid_scan_tag_view', $data);
    }
}