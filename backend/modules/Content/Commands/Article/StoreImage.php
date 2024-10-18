<?php

namespace Modules\Content\Commands\Article;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;
use Modules\Global\Services\Upload\Uploader;
use Modules\Identity\User\Models\User;

class StoreImage extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $file_name = Uploader::put('image', 'articles/org', Uploader::GENERATE_NEW_NAME);

        $article = Auth::user()->articles()->create([
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
