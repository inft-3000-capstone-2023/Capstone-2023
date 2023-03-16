<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_User extends Model
{
    use HasFactory;

    public $table = 'client_users';

    function roles(){
        return $this->belongsToMany(Role::class, 'client_role_user', 'client_user_id');
    }

    function client(){
        return $this->belongsTo(Client::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
