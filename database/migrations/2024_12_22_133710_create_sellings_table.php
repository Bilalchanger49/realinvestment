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
        Schema::create('sellings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The investor
            $table->foreignId('property_investment_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->integer('no_of_shares');
            $table->float('share_amount');
            $table->float('total_amount');
<<<<<<< HEAD
            $table->float('end_date')->nullable();
=======
            $table->time('end_date')->nullable();
>>>>>>> 2ba86e434b05d99ced21aada9a13efa0cd48f3a9
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
        Schema::dropIfExists('sellings');
    }
};
