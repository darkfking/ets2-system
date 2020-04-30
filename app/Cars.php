<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = [
        'nazwa', 'nr','silnik', 'rok', 'podwozie', 'kabina', 'przebieg', 'data', 'kierowca', 'link'
    ];
    
}
