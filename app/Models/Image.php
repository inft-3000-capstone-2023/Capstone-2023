<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path','alt_text', 'description'
    ];

    function events(){
        return $this->belongsToMany(Event::class);
    }
}
