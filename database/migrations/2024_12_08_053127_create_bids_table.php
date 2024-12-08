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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The investor
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->integer('no_of_shares');
            $table->float('share_amount_placed');
            $table->float('total_amount_placed');
            $table->float('share_amount_accepted')->nullable();
            $table->float('total_amount_accepted')->nullable();
            $table->time('end_date');
            $table->integer('remaining_shares');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
