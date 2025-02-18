<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class President extends Model
{
    protected $table = 'presidents';

    protected $fillables = ['name', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
