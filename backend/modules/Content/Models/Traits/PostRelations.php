<?php

namespace Modules\Content\Models\Traits;

use Modules\Identity\User\Models\User;

trait PostRelations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
