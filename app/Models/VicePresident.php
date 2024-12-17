<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VicePresident extends Model
{
    protected $table = 'vice_presidents';

    protected $fillables = ['name', 'candidate_no', 'votes'];
}
