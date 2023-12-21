<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_number');
        });
    }


    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
