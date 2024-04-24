<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedSmallInteger('manufacture_year')->nullable();
            $table->unsignedSmallInteger('register_year')->nullable();
            $table->unsignedBigInteger('transmission_id')->nullable();
            $table->unsignedBigInteger('body_type_id')->nullable();
            $table->unsignedBigInteger('drive_type_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('mileage')->nullable();
            $table->string('in_color')->nullable();
            $table->string('ex_color')->nullable();
            $table->string('license_plate')->unique()->nullable();
            $table->string('engine_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->unsignedSmallInteger('seating_capacity')->nullable();
            $table->unsignedSmallInteger('weight')->nullable();
            $table->unsignedSmallInteger('engine_capacity')->nullable();
            $table->date('purchase_date')->nullable();
            $table->unsignedDecimal('purchase_price', 10, 2)->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('supplier_phone')->nullable();
            $table->text('purchase_note')->nullable();
            $table->text('description')->nullable();
            $table->unsignedDecimal('price_per_km', 8, 2)->nullable();
            $table->unsignedDecimal('price_per_day', 8, 2)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
