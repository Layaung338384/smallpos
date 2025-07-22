<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('address');

            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('admin_payment_id')->constrained('admin_payments')->onDelete('cascade');

            $table->integer('quantity');
            $table->decimal('payment_amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

