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
        'fullname'
    ];
}

?>