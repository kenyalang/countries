<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Kenyalang\Countries\Enums\CountryStatus;
use Kenyalang\Countries\Models\Country;
use Kenyalang\Countries\Models\State;

uses(RefreshDatabase::class);

test('it should populate database with countries', function () {
    $this->artisan('migrate');

    $country = Country::whereName('Malaysia')->first();

    $state = $country->states()->where('name', 'Johor')->first();

    expect($country->name)->toBe('Malaysia')
        ->and($state->name)->toBe('Johor');
});

test('it should only get active countries', function () {
    $this->artisan('migrate');

    $country = Country::whereName('Malaysia')->first();

    $country->update(['status' => CountryStatus::ACTIVE->value]);

    $countries = Country::active()->get();

    expect($countries->count())->toBe(1)
        ->and($countries->first()->name)->toBe($country->name);
});

test('it can get states with locale', function () {
    $this->artisan('migrate');

    $state = State::withLocale()->whereName('Johor')->first();

    expect($state)->toHaveKeys(['currency_code', 'currency_name', 'currency_symbol', 'timezone', 'phone_code']);
});
