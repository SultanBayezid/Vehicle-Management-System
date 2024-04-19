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
        Schema::create('drivers', function (Blueprint $table) {
        $table->id();
        $table->string('driver_name');
        $table->string('license_number');
        $table->date('license_expiry_date');
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('postal_code')->nullable();
        $table->string('driver_phone_number')->nullable();
        $table->string('driver_email')->nullable();
        $table->date('date_of_birth')->nullable();
        $table->string('nationality')->nullable();
        $table->string('emergency_contact')->nullable();
        $table->string('emergency_phone')->nullable();
        $table->string('blood_group')->nullable();
        $table->string('nid')->nullable();
        $table->string('passport')->nullable();
        $table->string('photo')->nullable();
        $table->bigInteger('company_id');
        $table->bigInteger('user_id')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
