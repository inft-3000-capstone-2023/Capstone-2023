<?php

namespace App\Models;

use Couchbase\TermRangeSearchQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Customer extends Model
{
    use HasFactory;

    public $table = 'client_customers';

    function client(){
        return $this->belongsTo(Client::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function reviews(){
        return $this->hasMany(Review::class);
    }

    function transactions(){
        return $this->hasMany(Transaction::class, 'client_customer_id');
    }

    function preferences(){
        return $this->belongsToMany(Preference::class, 'client_customer_preference', 'client_customer_id');
    }
}
