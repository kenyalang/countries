<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Kenyalang\Countries\Enums\CountryStatus;
use Kenyalang\Countries\Models\Country;
use Kenyalang\Countries\Models\State;

return new class () extends Migration {
    public function up()
    {
        $countriesFile = __DIR__ . '/json/countries+states.json';
        $countries = json_decode(file_get_contents($countriesFile), true);

        collect($countries)->each(function ($country) {
            $timezone = Arr::first(Arr::pull($country, 'timezones'));

            /** @var Country $countryModel */
            $countryModel = Country::create([
                'name' => $country['name'],
                'code' => $country['iso3'],
                'phone_code' => $country['phone_code'],
                'currency_code' => $country['currency'],
                'currency_name' => $country['currency_name'],
                'currency_symbol' => $country['currency_symbol'],
                'timezone' => $timezone['zoneName'],
                'status' => config('countries.enable_all_countries')
                    ? CountryStatus::ACTIVE->value
                    : CountryStatus::INACTIVE->value,
            ]);

            foreach ($country['states'] as $state) {
                State::create([
                    'name' => $state['name'],
                    'code' => $state['state_code'],
                    'longitude' => $state['longitude'],
                    'latitude' => $state['latitude'],
                    'country_name' => $countryModel->name,
                ]);
            }
        });
    }

    public function down()
    {
        DB::table('countries')->truncate();
        DB::table('states')->truncate();
    }
};
