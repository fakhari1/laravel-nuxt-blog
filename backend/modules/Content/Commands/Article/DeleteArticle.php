<?php

namespace Modules\Content\Commands\Article;

use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\ActionRequest;
use Modules\Content\Models\Article;
use Modules\Global\Extendables\BaseCommandAction;

class DeleteArticle extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $article = Article::findOrFail($attributes['article_id']);

        if (Storage::disk($article->disk)->exists($article->image)) {
            Storage::disk($article->disk)->delete($article->image);
        }

        return $article->delete();
    }

    public function authorize(ActionRequest $request)
    {
        // return gate_authorization('update', $article);
        return true;
    }

    public function rules(): array
    {
        return [
            'article_id' => ['required', 'exists:articles,id'],
        ];
    }
}
