<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleMethodPart extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'articleId',
        'part',
        'title',
    ];

    protected $casts = [
        'articleId' => 'integer',
        'part' => 'string',
        'title' => 'string',
    ];

    public function methods()
    {
        return $this->hasMany(ArticleMethod::class, 'partId', 'id');
    }

}