<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleMethod extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'partId',
        'articleId',
        'title',
        'description',
        'image',
        'note',
        'number',
    ];

    protected $casts = [
        'partId' => 'integer',
        'articleId' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'note' => 'string',
        'number' => 'integer',
    ];

}