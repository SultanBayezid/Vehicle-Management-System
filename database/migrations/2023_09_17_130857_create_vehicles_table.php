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
        Schema::create('vehicles', function (Blueprint $table) {
          $table->id();
        $table->string('name');
        $table->string('make');
        $table->string('model');
        $table->year('year')->nullable();
        $table->string('vin')->nullable();
        $table->string('color')->nullable();
        $table->unsignedInteger('mileage')->nullable();
        $table->string('license_plate')->nullable();
        $table->string('engine_number')->nullable();
        $table->string('chassis_number')->nullable();
        $table->unsignedInteger('seating_capacity')->nullable();
        $table->unsignedFloat('weight')->nullable();
        $table->unsignedInteger('horsepower')->nullable();
        $table->date('purchase_date')->nullable();
        $table->unsignedFloat('purchase_price')->nullable();
        $table->date('last_service_date')->nullable();
        $table->unsignedInteger('odometer_reading')->nullable();
        $table->bigInteger('company_id');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
