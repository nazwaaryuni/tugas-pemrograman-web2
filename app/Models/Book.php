<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'author', 'publisher', 'year', 'isbn', 'stock'])]
class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    // protected $fillabel = ['title', 'author', 'publisher', 'year', 'isbn', 'stock'];
    // protected $guarder = ['id'];
}
