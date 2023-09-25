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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->date('completed_date');
            $table->string('odometer')->nullable();
            $table->string('document')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });

       
            Schema::create('issue_service', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('issue_id');
                $table->unsignedBigInteger('service_id');
                $table->timestamps();
        
                $table->foreign('issue_id')
                    ->references('id')
                    ->on('issues')
                    ->onDelete('cascade'); // This sets up cascading delete if you want it
                $table->foreign('service_id')
                    ->references('id')
                    ->on('services')
                    ->onDelete('cascade'); // Adjust 'services' to your actual table name
            });
        
        
    }

    /**
     * Reverse the migrations.
     */
   public function down()
    {
        Schema::dropIfExists('issue_service');
        Schema::dropIfExists('services');
    }
};
