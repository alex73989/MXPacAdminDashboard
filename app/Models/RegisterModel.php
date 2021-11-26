<?php

namespace App\Models;

use \CodeIgniter\Model;

class RegisterModel extends Model
{
    public function createUser($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $res = $builder->insert($data);
        if ($db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyUniid($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->select('activation_date,uniid,status');
        $builder->where('uniid', $id);
        $result = $builder->get();
        //echo count($result->getResultArray());
        //echo $result->resultID->num_rows;
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function updateStatus($uniid)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users_one');
        $builder->where('uniid', $uniid);
        $builder->update(['status' => 'active']);
        if ($db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
