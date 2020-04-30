<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rozpiski extends Model
{
    protected $fillable = [
        'kraj1', 'miasto1', 'kraj2', 'miasto2', 'kmpuste', 'kmztowarem', 'koszty', 'paliwo', 'kierowca', 'status'
    ];
}
