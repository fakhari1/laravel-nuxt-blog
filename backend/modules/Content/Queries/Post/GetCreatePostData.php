<?php

namespace Modules\Content\Queries\Post;

use Modules\Content\Models\Post;
use Modules\Global\Extendables\BaseAction;

class GetCreatePostData extends BaseAction
{
    public function handle()
    {
        try {
            $posts = Post::all();
        } catch (\Exception $e) {
            $posts = null;
            $this->handleThrowable($e);
        }

        return $posts;
    }
}
