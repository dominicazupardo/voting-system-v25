<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $table = 'secretaries';

    protected $fillable = ['firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
