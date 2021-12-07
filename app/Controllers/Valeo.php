<?php

namespace App\Controllers;
use App\Models\DashboardModel;
use App\Models\EmployeeModel;

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
        ];

        return view('NavbarContent/valeo_view', $data);
    }

    public function insert()
    {
        $employee = new EmployeeModel();
        $data = [
            'employeeid' => $this->request->getPost('employeeid'),
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),

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
            'fullname' => $this->request->getPost('fullname'),
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