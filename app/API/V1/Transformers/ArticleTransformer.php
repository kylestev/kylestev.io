<?php

namespace Kylestev\API\V1\Transformers;

use League\Fractal\TransformerAbstract;
use Kylestev\Article;

class ArticleTransformer extends TransformerAbstract
{

    public function transform(Article $article)
    {
        return [
            'id' => (int) $article->id,
            'title' => $article->title,
            'description' => $article->description,
            'article_url' => $article->article_url,
            'image' => $article->image_url,
            'published_at' => $article->published_at->timestamp,
        ];
    }

}
