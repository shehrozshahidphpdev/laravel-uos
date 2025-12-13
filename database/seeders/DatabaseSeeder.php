<?php

namespace Database\Seeders;

use App\Models\Admin\ResearchPublication;
use App\Models\Admin\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  /**s
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      ResearchPublicationSeeder::class,
    ]);
  }
}