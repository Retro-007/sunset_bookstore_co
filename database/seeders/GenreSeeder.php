<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['Action', 'Comedy', 'Fantasy', 'Horror', 'Mystery', 'Drama', 'Science', 'Fiction', 'Poetry', 'Folktale'];
        foreach ($status as $data) {
            DB::table('genres')->insert([
                'name' => $data
            ]);
        }
    }
}
