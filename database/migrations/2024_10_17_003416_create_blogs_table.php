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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('brief');
            $table->longText('content');
            $table->string('image');
            $table->text('galleries')->nullable();
            $table->unsignedBigInteger('hits')->default(0);
            $table->unsignedBigInteger('owner_id')->index();
            $table->string('status')->default(\App\Enums\StatusEnum::ACTIVE);
            $table->string('keywords')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
