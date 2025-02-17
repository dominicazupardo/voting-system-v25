<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $table = 'auditors';

    protected $fillables = ['name', 'candidate_no', 'votes', 'partylist_name'];
}
