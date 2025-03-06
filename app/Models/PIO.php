<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PIO extends Model
{
    protected $table = 'p_i_o_s';

    protected $fillable = ['firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image'];
}

