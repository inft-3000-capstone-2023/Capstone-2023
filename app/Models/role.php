<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    function tokens(){
        return $this->belongsToMany(Token::class);
    }

    function clientUsers(){
        return $this->belongsToMany(client_user::class);
    }
}
