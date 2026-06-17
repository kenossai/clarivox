<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('authors', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
      $table->string('name');
      $table->string('slug')->unique();
      $table->text('bio')->nullable();
      $table->string('email')->nullable();
      $table->json('social_links')->nullable();
      $table->string('status')->default('active');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('authors');
  }
};
