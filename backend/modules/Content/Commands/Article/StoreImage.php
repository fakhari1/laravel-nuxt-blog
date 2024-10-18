<?php

namespace Modules\Content\Commands\Article;

use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;
use Modules\Global\Services\Upload\Uploader;

class StoreImage extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $file_name = Uploader::put(
            'image',
            'articles/org',
            Uploader::GENERATE_NEW_NAME
        );

        $article = me()->articles()->create([
            'image' => $file_name,
            'disk' => config('global.upload.disk'),
        ]);

        return Responder::response([
            'article' => $article,
        ]);
    }

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => ['required', 'mimes:png,jpg,jpeg,gif']
        ];
    }
}
