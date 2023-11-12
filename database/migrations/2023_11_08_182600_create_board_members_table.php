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
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('upload_id')->nullable();
            $table->string('mission_tr')->nullable();
            $table->string('mission_en')->nullable();
            $table->tinyInteger('grid')->default(12);
            $table->tinyInteger('sort')->default(0);
            $table->tinyInteger('status')->default(\App\Enums\StatusEnum::ARCHIVE);
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
