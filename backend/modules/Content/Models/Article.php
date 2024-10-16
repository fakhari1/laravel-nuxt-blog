<?php

namespace Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Content\Models\Traits\Article\ArticleConstants;
use Modules\Content\Models\Traits\Article\ArticleRelations;
use Modules\Content\Models\Traits\Article\ArticleScopes;

class Article extends ArticleConstants
{
    use HasFactory, SoftDeletes, ArticleRelations, ArticleScopes;
}
