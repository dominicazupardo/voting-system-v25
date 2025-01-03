<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $table = 'ballots';

    protected $fillables = ['president', 'vice_president', 'secretary', 'treasurer', 'pio', 'auditor','business_manager'];
}
