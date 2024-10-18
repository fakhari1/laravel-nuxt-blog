<?php

namespace Modules\Content\Queries\Article;

use Modules\Content\Models\Article;
use Modules\Global\Extendables\BaseAction;

class GetArticle extends BaseAction
{
    public function handle(array $attributes = [])
    {
        return Article::findOrFail($attributes['article_id']);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'article_id' => ['required', 'exists:articles,id']
        ];
    }
}
