<?php

namespace Modules\Content\Queries\Article;

use Lorisleiva\Actions\ActionRequest;
use Modules\Content\Models\Article;
use Modules\Global\Extendables\BaseAction;
use Modules\Global\Services\Api\Responder;

class GetArticle extends BaseAction
{
    public function handle(array $attributes = [])
    {
        return Article::findOrFail($attributes['article_id']);
    }

    public function authorize(ActionRequest $request)
    {
        return true;
    }

    public function rules()
    {
        return [
            'article_id' => ['required', 'exists:articles,id']
        ];
    }

    public function asController(ActionRequest $request)
    {
        $this->fillFromRequest($request);

        return Responder::response(
            $this->handle($this->validateAttributes())
        );
    }
}
