<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessManager extends Model
{
    protected $table = 'business_managers';

    protected $fillable = ['firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image'];
}
