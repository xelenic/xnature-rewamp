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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->text('shop_name');
            $table->text('shop_code')->nullable();
            $table->text('shop_address');
            $table->text('shop_phone');
            $table->text('shop_email')->nullable();
            $table->text('shop_website')->nullable();
            $table->text('shop_gps_coordinates')->nullable();
            $table->text('shop_description')->nullable();
            $table->text('owners_name')->nullable();
            $table->text('owners_nic')->nullable();
            $table->text('owners_phone')->nullable();
            $table->text('owners_email')->nullable();
            $table->foreignId('route_id')->constrained();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
