<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PIO extends Model
{
    protected $table = 'p_i_o_s';

    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'candidate_no', 'votes', 'partylist_name', 'image', 'type'
    ];

    // Optionally, add scopes for internal/external
    public function scopeInternal($query)
    {
        return $query->where('type', 'internal');
    }
    public function scopeExternal($query)
    {
        return $query->where('type', 'external');
    }
}

