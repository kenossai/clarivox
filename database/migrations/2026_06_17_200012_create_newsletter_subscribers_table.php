<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('newsletter_subscribers', function (Blueprint $table) {
      $table->id();
      $table->foreignId('site_id')->constrained()->cascadeOnDelete();
      $table->string('email')->unique();
      $table->string('name')->nullable();
      $table->string('status')->default('active'); // active | unsubscribed
      $table->string('token')->nullable()->unique();
      $table->timestamp('verified_at')->nullable();
      $table->timestamp('unsubscribed_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('newsletter_subscribers');
  }
};
