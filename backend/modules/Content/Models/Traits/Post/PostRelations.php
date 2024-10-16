<?php

namespace Modules\Content\Models\Traits\Post;

use Modules\Identity\User\Models\User;

trait PostRelations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
