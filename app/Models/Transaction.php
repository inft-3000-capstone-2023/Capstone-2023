<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    function events(){
        return $this->belongsToMany(Event::class);
    }

    function tickets(){
        return $this->hasMany(Ticket::class);
    }

    function customer(){
        return $this->belongsTo(Customer::class);
    }
}
