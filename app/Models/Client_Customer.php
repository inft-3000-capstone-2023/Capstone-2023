<?php

namespace App\Models;

use Couchbase\TermRangeSearchQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client_Customer extends Model
{
    use HasFactory, softDeletes;

    public $table = 'client_customers';

    protected $fillable = [
        'user_id','client_id',
    ];

    function client(){
        return $this->belongsTo(Client::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function reviews(){
        return $this->hasMany(Review::class, 'client_customer_id');
    }

    function transactions(){
        return $this->hasMany(Transaction::class, 'client_customer_id');
    }

    function preferences(){
        return $this->belongsToMany(Preference::class, 'client_customer_preference', 'client_customer_id');
    }

    function email(){
        return $this->user->email;
    }

    function name(){
        return $this->user->name;
    }
}
