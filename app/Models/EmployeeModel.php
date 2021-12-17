<?php

namespace App\Models;

use \CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee_table';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'employeeid',
        'username',
        'password',
        'fullname',
        'usergroup_id',
        'usergroup_name',
        'usergroup_descrip',
        'contact_no',
        'card_id',
    ];
}

?>