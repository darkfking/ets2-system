<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailers extends Model
{
    protected $fillable = [
        'nazwa', 'nr', 'rok', 'typ', 'przebieg', 'data', 'kierowca', 'link'
    ];
}
