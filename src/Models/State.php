<?php

namespace Kenyalang\Countries\Models;

use Illuminate\Database\Eloquent\Model;
use Kenyalang\Countries\Traits\HasCountry;

class State extends Model
{
    use HasCountry;

    protected $fillable = [
        'name',
        'code',
        'country_name',
        'status',
        'timezone',
    ];
}
