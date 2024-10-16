<?php

namespace Modules\Content\Models\Traits\Post;

use Modules\Global\Extendables\BaseModel;

class PostConstants extends BaseModel
{
    protected $fillable = [
        'user_id',
        'body',
        'likes',
    ];

}
