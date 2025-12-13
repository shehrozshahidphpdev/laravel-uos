<?php

namespace Database\Seeders;

use App\Models\Admin\ResearchPublication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchPublicationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    ResearchPublication::factory()->count(15)->create();
  }
}