<?php

namespace Database\Factories\Admin;

use App\Models\Admin\ResearchPublication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResearchPublication>
 */
class ResearchPublicationFactory extends Factory
{
  protected $model = ResearchPublication::class;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  { {
      return [
        'dept_id' => 22,
        'authors' => $this->faker->name(),
        'title' => $this->faker->sentence(),
        'journal' => $this->faker->sentence(),
        'year' => 2025,
        'impact_factor' => 12.4,
        'category' => 'X',
      ];
    }
  }
}