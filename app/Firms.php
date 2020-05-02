<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firms extends Model
{
    protected $fillable = [
        'regulamin', 'mody','poradniki', 'konto', 'kilometry','paliwo','stawkapusta', 'stawkaladunek', 'stawkafirma'
    ];
}
