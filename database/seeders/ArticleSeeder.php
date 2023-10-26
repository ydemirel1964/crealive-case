<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = Article::firstOrCreate([
            'content_title' => 'Article1 Title',
            'content_description' => 'Article1 Description',
            'content' => 'Article1 Content',
            'user_id' => '1',
        ]);

        ArticleCategory::firstOrCreate([
            'article_id' => $article->id,
            'category_id' => '1',
        ]);
    }
}
