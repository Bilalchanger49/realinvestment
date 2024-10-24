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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('property_name');
            $table->text('property_description');
            $table->integer('property_reg_no');
            $table->text('property_address');
            $table->integer('property_price')->nullable();
            $table->integer('property_rent');
            $table->integer('property_share_price')->nullable();
            $table->text('property_remaining_shares')->default('0')->nullable();
            $table->text('property_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};