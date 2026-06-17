<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('testimonials', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->string('author_name');
      $table->string('author_title')->nullable();
      $table->string('author_company')->nullable();
      $table->text('content');
      $table->tinyInteger('rating')->default(5);
      $table->string('status')->default('published');
      $table->integer('sort_order')->default(0);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('testimonials');
  }
};
