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
    Schema::create('research_publications', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('dept_id');
      $table->foreign('dept_id')
        ->references('id')
        ->on('departments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->longText('authors');
      $table->longText('title');
      $table->longText('journal');
      $table->bigInteger('year');
      $table->bigInteger('impact_factor')->default('0');
      $table->string('category');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('research_publications');
  }
};