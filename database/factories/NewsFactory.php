<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Helper\TranslateToSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'author' => fake()->name(),
            'image' => 'assets/dino/images/dinosaurs/' . lcfirst(TranslateToSlug::translit(fake()->title)) .'.jpg',
            'description' => fake()->text(),
        ];
    }
}
