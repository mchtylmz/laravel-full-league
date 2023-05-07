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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('people_id')->nullable();
            $table->unsignedBigInteger('stadium_id');
            $table->timestamps();

            $table->foreign('stadium_id')->references('id')->on('stadiums');
            $table->foreign('people_id')->references('id')->on('people');
            $table->index(['stadium_id', 'status', 'people_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
