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

                 /* address Order */
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('address')->cascadeOnUpdate()->cascadeOnDelete();
                /* end address Order */

                   /* order */
            $table->string('quantity');
            $table->string('price');
            $table->integer('offer');
            $table->decimal('price_after_offer',8,2);
            $table->decimal('total_price',8,2);
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books')->cascadeOnUpdate()->cascadeOnDelete();
                 /* end order*/

            $table->string('status_payment');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
