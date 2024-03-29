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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('customer_id');
            $table->BigInteger('driver_id')->nullable();
            $table->BigInteger('vehicle_id');
            $table->string('pickup_location');
            $table->string('dropoff_location')->nullable();
            $table->decimal('fare_amount', 10, 2)->nullable();
            $table->date('trip_date')->nullable();
            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();
            $table->integer('distance_km')->nullable();
            $table->integer('status');
            $table->text('trip_notes')->nullable();
            $table->bigInteger('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
