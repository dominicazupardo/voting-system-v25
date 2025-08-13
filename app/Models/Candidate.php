<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image', 'year', 'position'
    ];

    public function ballots()
    {
        return $this->hasMany(Ballot::class, 'rep_1st_year')
            ->orWhere('rep_2nd_year', $this->id)
            ->orWhere('rep_3rd_year', $this->id)
            ->orWhere('rep_4th_year', $this->id);
    }
}
