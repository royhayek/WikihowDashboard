<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'video',
        'title',
        'description',
        'tips',
        'references',
        'authorId',
        'articleInfo',
        'warnings',
        'thingsNeeded',
        'views',
        'videoTranscript',
        'keyTakeaways',
    ];

    protected $casts = [
        'image' => 'string',
        'video' => 'string',
        'title' => 'string',
        'description' => 'string',
        'tips' => 'string',
        'references' => 'string',
        'authorId' => 'integer',
        'articleInfo' => 'string',
        'warnings' => 'string',
        'thingsNeeded' => 'string',
        'views' => 'integer',
        'videoTranscript' => 'string',
        'keyTakeaways' => 'string',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'authorId');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_categories', 'articleId', 'categoryId');
    }

    public function parts()
    {
        return $this->hasMany(ArticleMethodPart::class, 'articleId', 'id');
    }

}