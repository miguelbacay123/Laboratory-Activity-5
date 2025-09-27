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
    Schema::create('locations', function (Blueprint $table) {
        $table->id('location_id');
        $table->string('street_address')->nullable();
        $table->string('city');
        $table->string('state_province')->nullable();
        $table->string('postal_code')->nullable();
        $table->string('country_id'); // FK to countries
        $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
