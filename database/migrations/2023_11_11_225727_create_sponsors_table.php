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
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('left');
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('upload_id')->nullable();
            $table->tinyInteger('sort')->default(0);
            $table->tinyInteger('status')->default(\App\Enums\StatusEnum::ARCHIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
