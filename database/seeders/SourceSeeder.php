<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            'title' => 'Хищник'
        ]);

        DB::table('sources')->insert([
            'title' => 'Травоядный'
        ]);

        DB::table('sources')->insert([
            'title' => 'Всеядный'
        ]);
    }
}
