<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $table = 'secretaries';

    protected $fillables = ['name', 'candidate_no', 'votes'];
}
