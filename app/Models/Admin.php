<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model implements Authenticatable 
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    use \Illuminate\Auth\Authenticatable;

  
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthIdentifierName() {
        return 'id';
    }

    public function getAuthIdentifier() {
        return $this->getKey(); 
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }
    
    public function getRememberTokenName() {
        return 'remember_token';
    }
}
