<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $table = 'ballots';
    
    protected $fillables = [
        'president', 'vice_president', 'secretary', 
        'treasurer', 'pio', 'auditor',
        'peace_officer_1', 'peace_officer_2', 'auditor',
        'business_manager_1', 'business_manager_2'
    ];

    protected function user()
    {
        $this->belongsTo(User::class);
    }
}
