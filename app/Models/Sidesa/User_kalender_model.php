<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class User_kalender_model extends Model
{
    protected $table = 'sidesa_kalender_todolist';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['title', 'start', 'end', 'allDay', 'className'];
}
