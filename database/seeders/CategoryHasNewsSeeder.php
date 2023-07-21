<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;

class CategoryHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        News::all()->each(function ($news) use ($categories){
            $news->categories()->attach(
                $categories->random(1)->pluck('id')
            );
        });
    }
}
