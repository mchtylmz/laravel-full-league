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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('post_type_id');
            $table->string('slug');
            $table->string('title');
            $table->text('brief')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('upload_id')->nullable();
            $table->tinyInteger('single')->default(0);
            $table->tinyInteger('home')->default(0);
            $table->integer('sort')->default(1);
            $table->tinyInteger('status')->default(\App\Enums\StatusEnum::PASSIVE);
            $table->string('lang', 2)->default(\App\Enums\LocaleEnum::TR);
            $table->unsignedBigInteger('visits')->default(0);
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
