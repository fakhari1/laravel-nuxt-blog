<?php

namespace Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\Database\Factories\PostFactory;
use Modules\Content\Models\Traits\PostConstants;
use Modules\Content\Models\Traits\PostRelations;
use Modules\Content\Models\Traits\PostScopes;

class Post extends PostConstants
{
    use HasFactory, PostScopes, PostRelations;


    protected static function newFactory()
    {
        return PostFactory::new();
    }
}
