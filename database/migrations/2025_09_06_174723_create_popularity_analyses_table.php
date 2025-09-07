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
        Schema::create('popularity_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')
                ->constrained('locations')->onDelete('cascade');
            $table->date('period_date');
            $table->float('score')->default(0);
            $table->integer('total_posts')->default(0);
            $table->integer('positive_posts')->default(0);
            $table->integer('negative_posts')->default(0);
            $table->integer('neutral_posts')->default(0);
            $table->timestamps();

            $table->unique(['location_id', 'period_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popularity_analyses');
    }
};
