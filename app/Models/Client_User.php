<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_User extends Model
{
    use HasFactory;

    function roles(){
        return $this->belongsToMany(Role::class, 'client_role_user', 'role_id', 'client_user_id');
    }

    function client(){
        return $this->belongsTo(Client::class);
    }
}
