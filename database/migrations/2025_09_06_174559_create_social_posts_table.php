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
        Schema::create('social_posts', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->text('content');
            $table->tinyInteger('sentiment')->nullable(); // mapping: -1 = negative, 0 = neutral, 1 = positive
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('shares')->default(0);
            $table->timestamp('created_at_post')->nullable()->index();
            $table->foreignId('location_id')
                ->constrained('locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_posts');
    }
};
