<?php

namespace Kenyalang\Countries\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Kenyalang\Countries\Models\Country;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    /** @phpstan-ignore-next-line */
    #[ArrayShape(["name" => "string", "code" => "string", "phone_code" => "string", "currency_code" => "string", "currency_name" => "string", "currency_symbol" => "string", "status" => "string", "timezone" => "string"])]
    public function definition(): array
    {
        return [
            "name" => "Malaysia",
            "code" => "MYS",
            "phone_code" => "60",
            "currency_code" => "MYR",
            "currency_name" => "Malaysian ringgit",
            "currency_symbol" => "RM",
            "status" => "active",
            "timezone" => "Asia/Kuala_Lumpur",
        ];
    }
}
