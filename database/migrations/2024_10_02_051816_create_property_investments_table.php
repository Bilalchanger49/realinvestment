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
        Schema::create('property_investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The investor
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->integer('shares_owned');
            $table->integer('remaining_shares');
            $table->integer('share_price');
            $table->string('payment_id');
            $table->string('activity');
            $table->string('status');
            $table->decimal('total_investment', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_investments');
    }
};
