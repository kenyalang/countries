<?php

namespace Kenyalang\Countries\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'currency_code',
        'currency_name',
        'currency_symbol',
        'status',
        'timezone',
    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class, 'country_name', 'name');
    }

    public function scopeActive($query): void
    {
        $query->where('status', 'active');
    }
}
