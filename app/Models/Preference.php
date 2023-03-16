<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    function client_customers(){
        return $this->belongsToMany(Client_Customer::class, 'client_customer_preference', 'preference_id');
    }
}
