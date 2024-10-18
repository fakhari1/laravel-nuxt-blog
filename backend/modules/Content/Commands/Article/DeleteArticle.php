<?php

namespace Modules\Content\Commands\Article;

use Lorisleiva\Actions\ActionRequest;
use Modules\Content\Models\Article;
use Modules\Global\Extendables\BaseCommandAction;

class DeleteArticle extends BaseCommandAction
{
    private Article $article;

    public function execute(array $attributes = [])
    {
        return $this->article->delete();
    }

    public function authorize(ActionRequest $request)
    {
        $this->article = Article::findOrFail($request->article_id);
        // return gate_authorization('update', $this->article);
        return true;
    }

    public function rules(): array
    {
        return [
            'article_id' => ['required', 'exists:articles,id'],
        ];
    }
}
