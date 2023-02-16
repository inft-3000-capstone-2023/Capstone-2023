<?php

namespace App\Models;

use Couchbase\TermRangeSearchQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    function clients(){
        return $this->belongsToMany(Client::class);
    }

    function reviews(){
        return $this->hasMany(Review::class);
    }

    function transactions(){
        return $this->hasMany(Transaction::class);
    }

    function preferences(){
        return $this->belongsToMany(Preference::class);
    }
}
