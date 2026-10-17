<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prototype_screens', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('route')->nullable();
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->unsignedSmallInteger('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prototype_screens');
    }
};