<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'release_date',
        'description',
        'isbn',
        'format',
        'number_of_pages',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
