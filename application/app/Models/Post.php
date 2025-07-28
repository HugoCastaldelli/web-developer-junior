<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = false;
    protected $allowedFields = ['title', 'image', 'content'];
}
