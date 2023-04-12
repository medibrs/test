<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->decimal('amount_paid', 10, 2);
            $table->enum('payment_method', ['credit_card', 'debit_card', 'paypal']);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
