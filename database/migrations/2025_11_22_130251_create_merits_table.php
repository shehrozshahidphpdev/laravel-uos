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
    Schema::create('merits', function (Blueprint $table) {
      $table->id();
      $table->string('program_name');
      $table->enum('shift', ['Morning', 'Evening']);
      $table->string('first_merit_list')->nullable();
      $table->string('second_merit_list')->nullable();
      $table->string('third_merit_list')->nullable();
      $table->string('fourth_merit_list')->nullable();
      $table->string('fifth_merit_list')->nullable();
      $table->string('sixth_merit_list')->nullable();
      $table->string('seventh_merit_list')->nullable();
      $table->string('eighth_merit_list')->nullable();
      $table->string('nineth_merit_list')->nullable();
      $table->string('tenth_merit_list')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('merits');
  }
};