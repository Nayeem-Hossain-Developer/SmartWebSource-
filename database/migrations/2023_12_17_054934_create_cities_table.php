<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('city_ascii');
            $table->string('state_id');
            $table->string('state_name');
            $table->string('county_fips');
            $table->string('county_name');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->decimal('population', 10);
            $table->decimal('density', 6);
            $table->string('source');
            $table->enum('military',['TRUE','FALSE']);
            $table->enum('incorporated',['TRUE','FALSE']);
            $table->string('timezone');
            $table->integer('ranking');
            $table->string('zips')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
