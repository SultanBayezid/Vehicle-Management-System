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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicle_id');
            $table->bigInteger('driver_id')->nullable();
            $table->string('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('priority')->nullable();
            $table->string('image')->nullable();
            $table->date('due_date')->nullable();
            $table->date('report_date')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
