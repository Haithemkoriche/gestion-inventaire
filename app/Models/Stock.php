<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['id_article', 'status'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
}