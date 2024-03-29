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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('trans_date');
            $table->bigInteger('account_id');
            $table->bigInteger('chart_id');
            $table->string('type', 10);
            $table->string('dr_cr', 2);
            $table->decimal('amount', 10, 2);
            $table->bigInteger('payer_payee_id')->nullable();
            $table->bigInteger('invoice_id')->nullable();
            $table->bigInteger('purchase_id')->nullable();
            $table->bigInteger('purchase_return_id')->nullable();
            $table->bigInteger('payment_method_id');
            $table->string('reference', 50)->nullable();
            $table->text('attachment')->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
