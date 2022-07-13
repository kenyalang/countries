<?php

namespace Kenyalang\Countries\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Kenyalang\Countries\Models\State;

class StateFactory extends Factory
{
    protected $model = State::class;

    #[ArrayShape(["name" => "string", "code" => "string", "latitude" => "null", "longitude" => "null", "country_name" => "string"])]
    public function definition(): array
    {
        return [
            "name" => "Johor",
            "code" => "01",
            "latitude" => null,
            "longitude" => null,
            "country_name" => "Malaysia",
        ];
    }
}
