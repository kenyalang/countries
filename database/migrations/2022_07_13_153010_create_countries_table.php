<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kenyalang\Countries\Enums\CountryStatus;

return new class () extends Migration {
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('code');
            $table->string('phone_code');
            $table->string('currency_code');
            $table->string('currency_name');
            $table->string('currency_symbol');
            $table->string('status')->default(CountryStatus::INACTIVE->value);
            $table->string('timezone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
