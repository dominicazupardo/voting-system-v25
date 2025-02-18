<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treasurer extends Model
{
    protected $table = 'treasurers';

    protected $fillables = ['name', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
