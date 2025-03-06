<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VicePresident extends Model
{
    protected $table = 'vice_presidents';

    protected $fillable = ['firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
