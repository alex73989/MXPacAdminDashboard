<?php

namespace App\Controllers;

use \CodeIgniter\Exceptions\PageNotFoundException;
use \App\Models\RegisterModel;
use \App\Models\LoginModel;

class Auth extends BaseController
{
    public $session;
    public $email;

    //Model Variables
    public $registerModel;
    public $loginModel;

    public function __construct()
    {
        helper('form');
        helper('date');

        $this->registerModel = new RegisterModel();
        $this->loginModel = new LoginModel();

        $this->session = session();
        $this->email = \Config\Services::email();
    }

    public function login_controller()
    {
        $data = [
            'page_title' => 'Login Form',
            'page_heading' => 'Login Form',
        ];
        $data['validation'] = null;

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[16]',
            ];
            if($this->validate($rules))
            {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                // $throttler = \Config\Services::throttler();
                // $allow = $throttler->check("login",4,MINUTE); //Cannot login more than 4 times in a minute

                // if($allow)
                // {
                    $userdata = $this->loginModel->verifyEmail($email);
                    if($userdata)
                    {
                        if(password_verify($password, $userdata['password']))
                        {
                            if($userdata['status'] == 'active')
                            {
                                date_default_timezone_set('Asia/Kuala_Lumpur'); //Set TimeZone to MY ifnot default will delay +2 Hrs
                                $loginInfo = [
                                    'uniid' => $userdata['uniid'],
                                    'agent' => $this->getUserAgentInfo(),
                                    'ip' => $this->request->getIPAddress(),
                                    'login_time' => date('Y-m-d H:i:s'),
                                ];
                                $la_id = $this->loginModel->saveLoginInfo($loginInfo);
                                if($la_id)
                                {
                                    $this->session->set('logged_info',$la_id);
                                }

                                $this->session->set('logged_user',$userdata['uniid']);
                                return redirect()->to(base_url().'/dashboard-routes');
                            }
                            else
                            {
                                $data['error'] = 'Please activate your account. Contact Admin';
                                // $this->session->setTempdata('error','Please activate your account. Contact Admin', 3);
                                // return redirect()->to(current_url());
                            }
                        }
                        else
                        {
                            $data['error'] = 'Wrong password entered for that email';
                            // $this->session->setTempdata('error','Wrong password entered for that email', 3);
                            // return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        $data['error'] = 'Sorry! Email does not exists';
                        // $this->session->setTempdata('error','Sorry! Email does not exists', 3);
                        // return redirect()->to(current_url());
                    }
                // }
                // else
                // {
                //     $data['error'] = 'Max no.of failed login attempts. Try again after a minute';
                // }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/login', $data);
    }

    //Check whether the user is using which browser to open this webpage
    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if($agent->isBrowser())
        {
            $currentAgent = $agent->getBrowser();
        }
        elseif ($agent->isRobot())
        {
            $currentAgent = $this->agent->robot();
        }
        elseif ($agent->isMobile())
        {
            $currentAgent = $agent->getMobile();
        }
        else
        {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    }

    public function forgot_password()
    {
        $data = [
            'page_title' => 'Forgot Password Form',
            'page_heading' => 'Forgot Password Form',
        ];
            if($this->request->getMethod() == 'post')
            {
                $rules = [
                    'email' => [
                        'label' => 'Email',
                        'rules' => 'required|valid_email',
                        'error' => [
                            'required' => '{field} field required',
                            'valid_email' => 'Valid {field} required',
                        ]
                    ],
                ];
                if($this->validate($rules))
                {
                    $email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
                    $userdata = $this->loginModel->verifyEmail($email);
                    if(!empty($userdata))
                    {
                        if($this->loginModel->updateAt($userdata['uniid']))
                        {
                            $to = $email;
                            $subject = 'Reset Password Link';
                            $token = $userdata['uniid'];
                            $message = 'Hi '.$userdata['username'].'<br><br>'
                                    . 'Your reset password has been received. Please click'
                                    . 'the below link to reset your password. <br><br>'
                                    . '<a href="'. base_url().'/auth/reset_password/'.$token.'">Click here to Reset Password</a><br><br>'
                                    . 'Thanks<br>MXPac Group';

                            $email = \Config\Services::email();
                            $email->setTo($to);
                            $email->setFrom('info@okok.in', 'Info');
                            $email->setSubject($subject);
                            $email->setMessage($message);

                            if($email->send())
                            {
                                session()->setTempdata('success','Reset password link sent to your registered email. Please verify within 15mins',3);
                                return redirect()->to(current_url());
                            }
                            else
                            {
                                $data = $email->printDebugger(['headers']);
                                print_r($data);
                            }
                        }
                        else
                        {
                            $this->session->setTempdata('error', 'Sorry! Unable to update, try again',3);
                            return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'Email does not exists!',3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    $data['validation'] = $this->validator;
                }
            }

        return view('auth/forgot_password_view', $data);
    }

    public function reset_password($token=null)
    {
        $data = [];
        $data = [
            'page_title' => 'Reset Password Form',
            'page_heading' => 'Reset Password Form',
        ];

        if(!empty($token))
        {
            $userdata = $this->loginModel->verifyToken($token);
            if(!empty($userdata))
            {
                if($this->checkExpiryDate($userdata['updated_at']))
                {
                    if($this->request->getMethod() == 'post')
                    {
                        $rules = [
                            'enpwd' => [
                                'label' => 'Password',
                                'rules' => 'required|min_length[6]|max_length[16]',
                            ],
                            'cnpwd' => [
                                'label' => 'Confirm Password',
                                'rules' => 'required|matches[enpwd]',
                            ],
                        ];

                        if($this->validate($rules))
                        {
                            $enpwd = password_hash($this->request->getVar('enpwd'),PASSWORD_DEFAULT);
                            if($this->loginModel->updatePassword($token, $enpwd))
                            {
                                session()->setTempdata('success','Password updated successfully. Login Now',3);
                                return redirect()->to(base_url().'/login-routes');
                            }
                            else
                            {
                                session()->setTempdata('error','Sorry, Unable to update Password! Try Again',3);
                                return redirect()->to(current_url());
                            }
                        }
                        else
                        {
                            $data['validation'] = $this->validator;
                        }
                    }
                }
                else
                {
                    $data['error'] = 'Reset Password Link was expired!';
                }
            }
            else
            {
                $data['error'] = 'Unable to find user account';
            }
        }
        else
        {
            $data['error'] = 'Sorry! Unauthorized Access';
        }

        return view('auth/reset_password_view',$data);
    }

    public function checkExpiryDate($time)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $timeDiff = ($current_time - $update_time) / 60;
        //$timeDiff = strtotime(date("Y-m-d h:i:s")) - strtotime($time);
        if($timeDiff < 900)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function register_controller()
    {
        $data = [
            'page_title' => 'Register Form',
            'page_heading' => 'Registration Form',
        ];
        $data['validation'] = null;

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[4]|max_length[20]',
                'email' => 'required|valid_email|is_unique[users_one.email]',
                'pass' => 'required|min_length[6]|max_length[16]',
                'cpass' => 'required|matches[pass]',
                'mobile' => 'required|exact_length[10]|numeric',
            ];

            if ($this->validate($rules)) {
                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
                $userdata = [
                    'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                    'mobile' => $this->request->getVar('mobile'),
                    'uniid' => $uniid,
                    'activation_date' => date("Y-m-d h:i:s"),
                ];
                if ($this->registerModel->createUser($userdata)) {
                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation Link - MXPacGroup';
                    $message = 'Hi ' . $this->request->getVar('username', FILTER_SANITIZE_STRING) . ",<br><br>Thanks you, your account created "
                        . "successfully. Please click the below link to activate your account. <br><br>"
                        . "<a href='" . base_url() . "/auth/activate/" . $uniid . "' target='_blank'>Activate Now</a><br><br>Thanks<br><br>MXPacGroup";



                    $this->email->setTo($to);
                    $this->email->setSubject($subject);
                    $this->email->setFrom('info@okok.in', 'Info');
                    //$email->setBCC('somebcc@mail.com');
                    //$email->setCC('somecc@mail.com');

                    $this->email->setMessage($message);

                    if ($this->email->send()) {
                        $this->session->setTempdata('success', 'Account Created Successfully. Please activate your account', 3);
                        return redirect()->to(current_url()); //Go back to the same page
                    } else {
                        $this->session->setTempdata('error', 'Sorry! unable to send activation link. Contact Admin', 3);
                        return redirect()->to(current_url()); //Go back to the same page
                        // $data = $this->email->printDebugger(['headers']);
                        // print_r($data);
                    }
                } else {
                    $this->session->setTempdata('error', 'Sorry! Unable to create an account, Try again', 3);
                    return redirect()->to(current_url()); //Go back to the same page
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/register', $data);
    }

    public function activate($uniid = null)
    {
        $data = [];
        if (!empty($uniid)) {
            $userdata = $this->registerModel->verifyUniid($uniid);
            if ($userdata) {
                if ($this->verifyExpiryTime($userdata->activation_date)) {
                    if($userdata->status == 'inactive')
                    {
                        $status = $this->registerModel->updateStatus($uniid);
                        if($status == true)
                        {
                            $data['success'] = 'Account Activated Successfully';
                        }
                    }
                    else
                    {
                        $data['success'] = 'Your account is already activated';
                    }
                } else {
                    $data['error'] = 'Sorry! Activation link was expired!';
                }
            } else {
                $data['error'] = 'Sorry! We are Unable to find your account';
            }
        } else {
            $data['error'] = 'Sorry! Unable to process your request';
        }
        return view("auth/activate_view", $data);
    }

    public function verifyExpiryTime($regTime)
    {
        $currTime = now();
        $registerTime = strtotime($regTime);
        $diffTime = (int)$currTime - (int)$registerTime; //The gap while currTime will become bigger if the time is become more and more
        if (3600 > $diffTime) {
            return true; //3600 is 1hr = 60min = 3600 seconds
        } else {
            return false;
        }
    }

    // public function test($name){  --Getting parameter in method
    //     echo "Welcome to" .$name;
    // }

    /*First way of remapping
    public function _remap($method, $param1 = null){
        if($method == "test")
        { //Check whether the path having method call test or not
            return $this->$method($param1); //Get the method by passing some data
        }
        else
        {
            $this->index(); //If the method is not found then go back to index
        }
    }

    Second way of remapping
    public function _remap($method, $param1 = null){
        if(method_exists($this, $method))
        {
            return $this->$method($param1);
        }
        throw PageNotFoundException::forPageNotFound();
    }*/
}
