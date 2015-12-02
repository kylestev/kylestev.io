<?php

namespace Kylestev\API\V1\Controllers;

use Kylestev\Article;
use Kylestev\API\V1\Transformers\ArticleTransformer;

class ArticleController extends BaseController
{

    public function __construct()
    {
        // parent::__construct();
        app('Dingo\Api\Transformer\Factory')->register(Article::class, ArticleTransformer::class);
    }

    public function index()
    {
        return Article::all();
    }

}
