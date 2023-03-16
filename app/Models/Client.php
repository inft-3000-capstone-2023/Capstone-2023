<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'company_name','description', 'logo_path'
    ];

    function customers(){
        return $this->hasMany(Client_Customer::class);
    }

    function reviews(){
        return $this->hasMany(Review::class);
    }

    function tokens(){
        return $this->hasMany(Token::class);
    }

    function clientUsers(){
        return $this->hasMany(Client_User::class);
    }

    function events(){
        return $this->hasMany(Event::class);
    }


}
