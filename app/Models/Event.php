<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'client_id','event_title', 'event_description',
        'max_tickets_per_customer', 'date_time', 'end_time', 'time_zone', 'venue' ,'street',
        'city', 'province', 'postal_code', 'ticket_price'
    ];

    protected $casts = [
        'date_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    function client(){
        return $this->belongsTo(Client::class);
    }

    function images(){
        return $this->belongsToMany(Image::class);
    }

    function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
