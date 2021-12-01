<?php

namespace App\Models;

use \CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getAllUserData()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $result = $builder->get();
        if (count($result->getResultArray()) > 0) {
            return $result->getResult();
        } else {
            return false;
        }
    }

    public function getLoggedInUserData($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid', $id);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function updateLogoutTime($id)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $db      = \Config\Database::connect();
        $builder = $db->table('login_activity');
        $builder->where('id', $id);
        $builder->update(['logout_time' => date('Y-m-d H:i:s')]);
        if ($db->affectedRows() > 0) {
            return true;
        }
    }

    public function getLoginUserInfo($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('login_activity');
        $builder->where('uniid', $id);
        $builder->orderBy('id', 'DESC');
        $builder->limit(10);
        $result = $builder->get();

        if (count($result->getResultArray()) > 0) {
            return $result->getResult();
        } else {
            return false;
        }
    }

    public function updateAvatar($path, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid', $id);
        $builder->update(['profile_pic' => $path]);
        if ($db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($enpwd, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid', $id);
        $builder->update(['password' => $enpwd]);
        if ($db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserInfo($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid', $id);
        $builder->update($data);
        if ($db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
