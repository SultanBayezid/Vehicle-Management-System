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
        Schema::create('fuels', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->date('date');
            $table->string('odometer')->nullable();
            $table->integer('qty')->nullable();
            $table->string('reference')->nullable();
            $table->string('attachment')->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('company_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuels');
    }
};
