<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feature_prototype_screen', function (Blueprint $table) {
            $table->foreignId('feature_id')->constrained()->cascadeOnDelete();
            $table->foreignId('prototype_screen_id')->constrained()->cascadeOnDelete();
            $table->primary(['feature_id', 'prototype_screen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feature_prototype_screen');
    }
};