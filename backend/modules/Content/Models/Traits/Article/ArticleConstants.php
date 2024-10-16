<?php

namespace Modules\Content\Models\Traits\Article;

use Modules\Global\Extendables\BaseModel;

class ArticleConstants extends BaseModel
{
    protected $fillable = [
        'user_id',
        'is_commentable',
        'image',
        'title',
        'draft',
        'description',
        'slug',
    ];

}
