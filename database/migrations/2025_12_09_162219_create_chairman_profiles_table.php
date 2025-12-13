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
    Schema::create('chairman_profiles', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->longText('position')->nullable();
      $table->string('designation');
      $table->longText('qualification');
      $table->string('specialization');
      $table->string('email')->unique();
      $table->unsignedBigInteger('dept_id');
      $table->foreign('dept_id')
        ->references('id')
        ->on('departments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('chairman_profiles');
  }
};