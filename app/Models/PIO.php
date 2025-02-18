<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PIO extends Model
{
    protected $table = 'p_i_o_s';

    protected $fillables = ['name', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
