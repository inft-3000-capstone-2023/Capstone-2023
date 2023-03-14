<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use softDeletes;

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
