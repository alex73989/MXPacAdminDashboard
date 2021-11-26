<?php

namespace App\Models;

use \CodeIgniter\Model;

class LoginModel extends Model
{
    public function verifyEmail($email)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->select('uniid,status,username,password');
        $builder->where('email', $email);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) //Check whether the data is exist or not
        {
            return $result->getRowArray();
        } else {
            return false;
        }
    }

    public function saveLoginInfo($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('login_activity');
        $builder->insert($data);
        if ($db->affectedRows() == 1) {
            return $db->insertID();
        } else {
            return false;
        }
    }

    public function updateAt($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid',$id);
        $builder->update(['updated_at' => date('Y-m-d h:i:s')]);
        if($db->affectedRows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function verifyToken($token)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->select('uniid,username,updated_at');
        $builder->where('uniid', $token);
        $result = $builder->get();
 
        if(count($result->getResultArray()) == 1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }

    }

    public function updatePassword($id, $pwd)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid', $id);
        $builder->update(['password' => $pwd]);
        if($db->affectedRows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
