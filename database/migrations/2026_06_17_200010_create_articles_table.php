<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
      $table->foreignId('author_id')->nullable()->constrained()->nullOnDelete();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('excerpt')->nullable();
      $table->longText('content')->nullable();
      $table->string('featured_image')->nullable();
      $table->string('status')->default('draft'); // draft | published | archived
      $table->boolean('featured')->default(false);
      $table->boolean('allow_comments')->default(true);
      $table->unsignedBigInteger('views_count')->default(0);
      $table->timestamp('published_at')->nullable();
      $table->string('meta_title')->nullable();
      $table->string('meta_description')->nullable();
      $table->string('og_image')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::create('article_tag', function (Blueprint $table) {
      $table->foreignId('article_id')->constrained()->cascadeOnDelete();
      $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
      $table->primary(['article_id', 'tag_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('article_tag');
    Schema::dropIfExists('articles');
  }
};
