<?php

namespace Modules\Content\Commands\Article;

use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Modules\Content\Models\Article;
use Modules\Content\Policies\ArticlePolicy;
use Modules\Global\Extendables\BaseCommandAction;

class UpdateArticle extends BaseCommandAction
{
    private Article $article;

    public function execute(array $attributes = [])
    {
        return $this->article->update([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'is_draft' => $attributes['is_draft'] == 1,
        ]);

    }

    public function authorize(ActionRequest $request)
    {
        $this->article = Article::findOrFail($request->article_id);

        return gate_authorization('update', $this->article);
    }

    public function rules(): array
    {
        return [
            'article_id' => ['required', 'exists:articles,id'],
            'title' => ['nullable', 'string', Rule::unique('articles', 'title')->ignore(request()->get('article_id'))],
            'description' => ['nullable', 'string'],
            'is_draft' => ['nullable', 'in:0,1'],
        ];
    }
}
