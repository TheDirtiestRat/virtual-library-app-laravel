<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        // 'book_id',
        'id',
        'title',
        'subtitle',
        'authors',
        'publisher',
        'publishedDate',
        'description',
        'pageCount',
        'categories',
        'thumbnail',
        'industryIdentifiers',
        'previewLink',
        'infoLink',
        'available_copies',
    ];
}
