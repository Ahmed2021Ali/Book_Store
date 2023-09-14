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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('note')->nullable();
            $table->string('quantity');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('number_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
