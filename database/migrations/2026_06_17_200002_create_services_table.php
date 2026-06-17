<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('services', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('excerpt')->nullable();
      $table->longText('description')->nullable();
      $table->string('icon')->nullable();
      $table->string('image')->nullable();
      $table->string('status')->default('published');
      $table->integer('sort_order')->default(0);
      $table->string('meta_title')->nullable();
      $table->string('meta_description')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('services');
  }
};
