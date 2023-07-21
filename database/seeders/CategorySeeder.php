<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $data = [];
        for($i=0; $i<9; $i++) {
            $data[] = [
                'title' => 'Category ' .$i ,
                'description' => fake()->text(200),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
