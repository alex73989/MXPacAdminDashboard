<?php

namespace App\Controllers;
use App\Models\DashboardModel;
use App\Models\EmployeeModel;

class Valeo extends BaseController
{
    public $dashboardModel;
    private $db;
    
    public function __construct()
    {
        $this->db = db_connect();
        $this->dashboardModel = new DashboardModel();
        helper('form');
    }

    public function valeo_controller()
    {
        $uniid = session()->get('logged_user');
        $data = [
            
            'userlevel' => $this->db->query("SELECT * from users_level_management")->getResultArray(),
            'page_title' => 'Valeo',
            'userdata' => $this->dashboardModel->getLoggedInUserData($uniid),
        ];

        return view('NavbarContent/valeo_view', $data);
    }

    public function insert()
    {
        $employee = new EmployeeModel();
        $data = [
            'employeeid' => $this->request->getPost('employeeid'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'fullname' => $this->request->getPost('fullname'),
            'usertype' => $this->request->getPost('usertype'),
            'usergroup_id' => $this->request->getPost('usergroup_id'),
            'usergroup_name' => $this->request->getPost('usergroup_name'),
            'usergroup_descrip' => $this->request->getPost('usergroup_descrip'),
            'contact_no' => $this->request->getPost('contact_no'),
            'card_id' => $this->request->getPost('card_id'),

        ];
        if($employee->save($data)){
            $data = [
                'status' => 'success',
                'message' => 'Record added Successfully'
            ];
        }
        else{
            $data = [
                'status' => 'error',
                'message' => 'Failed to add data'
            ];
            
        }
        return $this->response->setJSON($data);
        
    }

    public function fetch(){
        $employee = new EmployeeModel();
        if($posts = $employee->findAll()){
            $data = [
                'status' => 'success',
                'employee_table' => $posts,
            ];
        }
        else{
            $data = [
                'status' => 'error',
                'message' => 'Failed to get data from database'
            ];
        }
        
        return $this->response->setJSON($data);
    }

    public function view(){
        $employee = new EmployeeModel();
        $main_id = $this->request->getPost('main_id');
        $data['employee_table'] = $employee->find($main_id);
        return $this->response->setJSON($data);
    }

    public function edit(){
        $employee = new EmployeeModel();
        $main_id = $this->request->getPost('main_id');
        $data['employee_table'] = $employee->find($main_id);
        return $this->response->setJSON($data);
    }

    public function update(){
        $employee = new EmployeeModel();
        $main_id = $this->request->getPost('main_id');
        $userdata = [
            'employeeid' => $this->request->getPost('employeeid'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'fullname' => $this->request->getPost('fullname'),
            'usertype' => $this->request->getPost('usertype'),
            'usergroup_id' => $this->request->getPost('usergroup_id'),
            'usergroup_name' => $this->request->getPost('usergroup_name'),
            'usergroup_descrip' => $this->request->getPost('usergroup_descrip'),
            'contact_no' => $this->request->getPost('contact_no'),
            'card_id' => $this->request->getPost('card_id'),
        ];
        if($employee->update($main_id, $userdata)){
            $data = [
                'status' => 'success',
                'message' => 'Updated Successfully'
            ];
        }
        else{
            $data = [
                'status' => 'error',
                'message' => 'Failed to update data'
            ];
        }
        
        return $this->response->setJSON($data);
    }

    public function delete(){
        $employee = new EmployeeModel();
        if($employee->delete($this->request->getPost('del_id'))){
            $data = [
                'status' => 'success',
            ];
        }
        else{
            $data = [
                'status' => 'error',
            ];
        }
        return $this->response->setJSON($data);
    }
}