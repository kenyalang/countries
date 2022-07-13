<?php

namespace Kenyalang\Countries\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kenyalang\Countries\Models\Country;

trait HasCountry
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_name', 'name');
    }

    public function scopeWithLocale($query): void
    {
        $query->addSelect([
            'currency_code' => Country::toBase()
                ->whereColumn('name', 'country_name')
                ->select('currency_code')
                ->take(1),
            'currency_name' => Country::toBase()
                ->whereColumn('name', 'country_name')
                ->select('currency_name')
                ->take(1),
            'currency_symbol' => Country::toBase()
                ->whereColumn('name', 'country_name')
                ->select('currency_symbol')
                ->take(1),
            'timezone' => Country::toBase()
                ->whereColumn('name', 'country_name')
                ->select('timezone')
                ->take(1),
            'phone_code' => Country::toBase()
                ->whereColumn('name', 'country_name')
                ->select('phone_code')
                ->take(1),
        ]);
    }
}
