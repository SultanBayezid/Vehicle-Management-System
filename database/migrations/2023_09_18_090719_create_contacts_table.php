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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
			$table->string('profile_type',20);
			$table->string('company_name',50)->nullable();
			$table->string('contact_name',50);
			$table->string('contact_email',100)->nullable();
			$table->string('contact_phone',20)->nullable();
			$table->string('country',50)->nullable();
			$table->string('city',50)->nullable();
			$table->string('state',50)->nullable();
			$table->string('zip',20)->nullable();
			$table->text('address')->nullable();
			$table->text('remarks')->nullable();
			$table->string('contact_image')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->bigInteger('group_id');
            $table->string('license_number')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
