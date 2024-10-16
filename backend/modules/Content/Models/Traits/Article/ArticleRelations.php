<?php

namespace Modules\Content\Models\Traits\Article;

use Modules\Identity\User\Models\User;

trait ArticleRelations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
