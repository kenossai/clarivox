<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('pages', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->string('title');
      $table->string('slug')->unique();
      $table->longText('content')->nullable();
      $table->string('template')->default('default');
      $table->string('status')->default('draft'); // draft | published | archived
      $table->integer('sort_order')->default(0);
      $table->string('meta_title')->nullable();
      $table->string('meta_description')->nullable();
      $table->string('og_image')->nullable();
      $table->json('hero')->nullable(); // hero section data
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('pages');
  }
};
