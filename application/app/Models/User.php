<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $allowedFields = ['usuario', 'senha'];
}
