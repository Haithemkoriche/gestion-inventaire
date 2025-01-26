<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 
    public function offices()
    {
        return $this->belongsToMany(Office::class, 'article_office');
    }
    public function stock()
    {
        return $this->hasOne(Stock::class, 'id_article');
    }
}