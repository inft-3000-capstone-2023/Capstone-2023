<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    function tokens(){
        return $this->belongsToMany(Token::class);
    }

    function clientUsers(){
        return $this->belongsToMany(Client_User::class, 'client_role_user', 'role_id');
    }
}
