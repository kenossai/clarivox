<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('article_id')->constrained()->cascadeOnDelete();
      $table->foreignId('parent_id')->nullable()->constrained('comments')->nullOnDelete();
      $table->string('author_name');
      $table->string('author_email');
      $table->text('content');
      $table->string('status')->default('pending'); // pending | approved | rejected | spam
      $table->string('ip_address', 45)->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('comments');
  }
};
