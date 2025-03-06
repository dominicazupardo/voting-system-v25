<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeaceOfficer extends Model
{
    protected $table = 'peace_officers';

    protected $fillable = ['firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
