<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_User extends Model
{
    use HasFactory;

    public $table = 'client_users';

    protected $fillable = [
        'client_id','user_id', 'created_at'
    ];

    function roles(){
        return $this->belongsToMany(Role::class, 'client_role_user', 'client_user_id');
    }

    function client(){
        return $this->belongsTo(Client::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function email(){
        return $this->user->email;
    }

    function name(){
        return $this->user->name;
    }
}
