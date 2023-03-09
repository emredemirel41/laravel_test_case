<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Author::truncate();
        Book::truncate();
        
        Author::factory(10)->has(Book::factory()->count(5))->create(); //Authors with books
        Author::factory(3)->create(); // Authors without books

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
