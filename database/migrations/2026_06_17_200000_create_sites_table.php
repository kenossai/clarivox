<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('sites', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('domain')->unique();
      $table->string('type')->default('creative'); // creative | news
      $table->string('theme')->default('creative');
      $table->string('status')->default('active'); // active | maintenance | inactive
      $table->string('logo')->nullable();
      $table->string('favicon')->nullable();
      $table->json('settings')->nullable(); // extra site-specific config
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('sites');
  }
};
