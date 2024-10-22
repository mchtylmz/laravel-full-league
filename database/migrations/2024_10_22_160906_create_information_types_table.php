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
        Schema::create('information_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('group', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_types');
    }
};
