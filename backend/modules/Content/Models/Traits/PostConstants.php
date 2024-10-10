<?php

namespace Modules\Content\Models\Traits;

use Modules\Content\Database\Factories\PostFactory;
use Modules\Global\Extendables\BaseModel;

class PostConstants extends BaseModel
{
    protected $fillable = [
        'user_id',
        'body',
        'likes',
    ];

}
