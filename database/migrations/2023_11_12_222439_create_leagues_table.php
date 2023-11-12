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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name_tr');
            $table->string('name_en')->nullable();
            $table->string('gentleman_tr')->nullable();
            $table->string('gentleman_en')->nullable();

            $table->string('upload_id')->nullable();
            $table->tinyInteger('sort')->default(1);
            $table->tinyInteger('status')->default(\App\Enums\StatusEnum::PASSIVE);
            $table->tinyInteger('post_status')->default(\App\Enums\StatusEnum::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leagues');
    }
};
