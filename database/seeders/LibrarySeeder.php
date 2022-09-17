<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            # code...
            DB::table('libraries')->insert([
                'name' => 'Sunset' . '-' . Str::random(10) . '-' . 'Library',
            ]);
        }
    }
}
