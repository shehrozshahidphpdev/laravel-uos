<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('oric_publications', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('rank');
      $table->string('department');
      $table->json('authors');
      $table->string('title');
      $table->string('journal');
      $table->string('year');
      $table->integer('if');
      $table->string('category');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('oric_publications');
  }
};