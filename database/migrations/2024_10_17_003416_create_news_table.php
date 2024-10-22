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
            $table->unsignedBigInteger('season_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('lang', 5)->default(\App\Enums\LocaleEnum::TR);
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('brief')->default('');
            $table->longText('content');
            $table->string('image');
            $table->unsignedBigInteger('hits')->default(0);
            $table->string('keywords')->nullable();
            $table->unsignedBigInteger('owner_id')->index();
            $table->tinyInteger('show_homepage')->default(\App\Enums\YesNoEnum::NO);
            $table->string('status')->default(\App\Enums\StatusEnum::ACTIVE);
            $table->string('source')->nullable();
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
        Schema::dropIfExists('news');
    }
};
