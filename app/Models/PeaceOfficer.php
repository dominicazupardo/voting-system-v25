<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeaceOfficer extends Model
{
    protected $table = 'peace_officers';

    protected $fillables = ['name', 'candidate_no', 'votes'];
}
