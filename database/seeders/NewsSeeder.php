<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Source;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());

//        $sources = Source::all();
//
//        News::all()->each(function ($news) use ($sources) {
//            $news->source()->attach(
//                $sources->random(1)->pluck('id')
//            );
//        });
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
                'source_id' => null,
            ];
        }

        return $data;
    }
}
