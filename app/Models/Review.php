<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $table = 'reviews';

    protected $fillable = [
        'client_customer_id','client_id',
        'title', 'description', 'rating',
    ];

    function client(){
        return $this->belongsTo(Client::class);
    }

    function customer(){
        return $this->belongsTo(Client_Customer::class, 'client_customer_id', 'id');
    }
}
