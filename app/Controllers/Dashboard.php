<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        helper('form');
    }

    public function dashboard_controller()
    {
        $data = [
            'page_title' => 'Dashboard',
        ];

        $uniid = session()->get('logged_user');
        // $userdata = $this->dashboardModel->getLoggedInUserData($uniid);
        // print_r($userdata);
        $data['userdata'] = $this->dashboardModel->getLoggedInUserData($uniid);

        return view('dashboard_view', $data);
    }

    public function logout()
    {
        //Update the user logout time
        if(session()->has('logged_info'))
        {
            $la_id = session()->get('logged_info');
            $this->dashboardModel->updateLogoutTime($la_id);
        }

        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url() . "/login-routes");
    }

    public function login_activity()
    {
        $data['userdata'] = $this->dashboardModel->getLoggedInUserData(session()->get('logged_user'));
        $data['login_info'] = $this->dashboardModel->getLoginUserInfo(session()->get('logged_user'));
        return view('login_activity_view', $data);    
    }

    public function avatar()
    {
        $data = [];
        $data['userdata'] = $this->dashboardModel->getLoggedInUserData(session()->get('logged_user')); 
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,png,jpg,gif,jpeg]',
            ];
            if($this->validate($rules))
            {
                $file = $this->request->getFile('avatar');
                if($file->isValid() && !$file->hasMoved())
                {
                    if($file->move(FCPATH.'public\profiles', $file->getRandomName()))
                    {
                        $path = base_url().'/public/profiles/'.$file->getName();
                        $status = $this->dashboardModel->updateAvatar($path, session()->get('logged_user'));

                        if($status == true)
                        {
                            session()->setTempdata('success','Avatar is uploaded successfully!',3);
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            session()->setTempdata('error','Sorry! Unable to upload avatar',3);
                            return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        session()->setTempdata('error',$file->getErrorString(),3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    session()->setTempdata('error','You have uploaded invalid file',3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view ("avatar_view",$data);
    }

    public function change_password()
    {
        $data = [];
        $data['userdata'] = $this->dashboardModel->getLoggedInUserData(session()->get('logged_user')); 

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'eopwd' => 'required',
                'enpwd' => 'required|min_length[6]|max_length[16]',
                'cnpwd' => 'required|matches[enpwd]',
            ];
            if($this->validate($rules))
            {
                $eopwd = $this->request->getVar('eopwd');
                $enpwd = password_hash($this->request->getVar('enpwd'), PASSWORD_DEFAULT);

                if(password_verify($eopwd, $data['userdata']->password))
                {
                    if($this->dashboardModel->updatePassword($enpwd, session()->get('logged_user')))
                    {
                        session()->setTempdata('success','Password Updated Successfully!',3);
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        session()->setTempdata('error', 'Sorry! Unable to update the password, try again',3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    session()->setTempdata('error','Old Password does not matched with db password!',3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('change_password_view', $data);
    }

    public function edit()
    {
        $data = [];
        $data['validation'] = null;
        $data['userdata'] = $this->dashboardModel->getLoggedInUserData(session()->get('logged_user'));

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'username' => 'required|min_length[4]|max_length[20]',
                'mobile' => 'required|exact_length[10]|numeric',
            ];
            if($this->validate($rules))
            {
                $userdata = [
                    'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                    'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_NUMBER_INT),
                ];

                if($this->dashboardModel->updateUserInfo($userdata, session()->get('logged_user')))
                {
                    session()->setTempdata('success', 'Profile Updated Successfully!',3);
                    return redirect()->to(current_url());
                }
                else
                {
                    session()->setTempdata('error', 'Sorry! Unable to update Profile, try again',3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('edit_view', $data);
    }
}
