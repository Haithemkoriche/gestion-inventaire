<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    public function sieges()
    {
        return $this->belongsToMany(Siege::class, 'office_siege', 'office_id', 'siege_id');
    }
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_office');
    }
}




