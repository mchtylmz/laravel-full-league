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
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('board_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->string('position_tr');
            $table->string('position_en')->nullable();
            $table->tinyInteger('grid')->default(12);
            $table->tinyInteger('sort')->default(0);
            $table->tinyInteger('status')->default(\App\Enums\StatusEnum::PASSIVE);
            $table->timestamps();

            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};
