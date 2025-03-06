<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treasurer extends Model
{
    protected $table = 'treasurers';

    protected $fillable = ['firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
