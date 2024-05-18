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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('linkimage');
            $table->string('title');
            $table->text('content');
            $table->string('author');
            $table->timestamps();
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('player_id');

            // foreign key

            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
