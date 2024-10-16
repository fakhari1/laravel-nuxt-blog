<?php

namespace Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Content\Database\Factories\PostFactory;
use Modules\Content\Models\Traits\Post\PostConstants;
use Modules\Content\Models\Traits\Post\PostRelations;
use Modules\Content\Models\Traits\Post\PostScopes;

class Post extends PostConstants
{
    use HasFactory, SoftDeletes, PostScopes, PostRelations;


    protected static function newFactory()
    {
        return PostFactory::new();
    }
}
