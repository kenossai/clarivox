<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('portfolio_projects', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('excerpt')->nullable();
      $table->longText('description')->nullable();
      $table->string('client')->nullable();
      $table->string('category')->nullable();
      $table->date('completion_date')->nullable();
      $table->string('project_url')->nullable();
      $table->string('status')->default('published');
      $table->boolean('featured')->default(false);
      $table->integer('sort_order')->default(0);
      $table->json('tags')->nullable();
      $table->string('meta_title')->nullable();
      $table->string('meta_description')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('portfolio_projects');
  }
};
