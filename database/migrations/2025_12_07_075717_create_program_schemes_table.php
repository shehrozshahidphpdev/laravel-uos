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
    Schema::create('program_schemes', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('program_id');
      $table->foreign('subject_id')
        ->references('id')
        ->on('programs')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->string('program_title');
      $table->json('courses');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('program_schemes');
  }
};
