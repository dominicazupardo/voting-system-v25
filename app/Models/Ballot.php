<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $table = 'ballots';
    
    protected $fillable = [
        'president', 'vice_president', 'secretary', 
        'treasurer', 'pio_internal', 'pio_external', 'auditor',
        'peace_officer_1', 'peace_officer_2',
        'business_manager_1', 'business_manager_2',
        'rep_1st_year', 'rep_2nd_year', 'rep_3rd_year', 'rep_4th_year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
