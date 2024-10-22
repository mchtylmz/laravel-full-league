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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->index();
            $table->bigInteger('sort')->default(1)->index();
            $table->string('code')->nullable();
            $table->string('short_name')->default('');
            $table->string('name_tr');
            $table->string('name_en')->default('');
            $table->text('description_tr')->nullable();
            $table->text('description_en')->nullable();
            $table->string('status')->default(\App\Enums\StatusEnum::ACTIVE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
