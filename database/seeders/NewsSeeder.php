<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => fake()->title(),
                'author' => fake()->name(),
                'image' => fake()->title(),
                'description' => fake()->text(200),
                'created_at' => now(),
                'updated_at' => now(),
                'source_id' => null
            ];
        }

        return $data;
    }
}
