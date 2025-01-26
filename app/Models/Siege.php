<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siege extends Model
{
    public function offices()
    {
        return $this->belongsToMany(Office::class, 'office_siege', 'siege_id', 'office_id');
    }
}
