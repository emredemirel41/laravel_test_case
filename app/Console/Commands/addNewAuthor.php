<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Console\Command;

class addNewAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:new-author {numberofbooks}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create random author with books count';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $author = Author::factory(1)->has(Book::factory()->count(intval($this->argument('numberofbooks'))))->create();
        return $this->info("The author was created!");
    }
}
