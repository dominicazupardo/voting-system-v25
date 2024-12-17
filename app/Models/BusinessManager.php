<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessManager extends Model
{
    protected $table = 'business_managers';

    protected $fillables = ['name', 'candidate_no', 'votes'];
}
