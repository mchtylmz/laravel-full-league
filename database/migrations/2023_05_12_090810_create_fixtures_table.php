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
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->string('match');
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('league_id');
            $table->unsignedBigInteger('week_id');
            $table->date('match_date');
            $table->time('match_hour');
            $table->unsignedBigInteger('stadium_id');
            $table->unsignedBigInteger('home_id');
            $table->unsignedBigInteger('away_id');
            $table->integer('delay')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->foreign('week_id')->references('id')->on('weeks');
            $table->foreign('stadium_id')->references('id')->on('stadiums');
            $table->foreign('home_id')->references('id')->on('teams');
            $table->foreign('away_id')->references('id')->on('teams');

            $table->index(['season_id',]);
            $table->index(['league_id']);
            $table->index(['week_id']);
            $table->index(['home_id']);
            $table->index(['away_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
