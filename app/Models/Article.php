<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "articles";
    protected $fillable = [
        'content_title',
        'content',
        'content_description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articleCategories()
    {
        return $this->hasMany(ArticleCategory::class);
    }

}
