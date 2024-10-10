<?php

namespace Modules\Global\Extendables;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeMyOwn($query)
    {
        return $query->where('user_id', auth()->id());
    }

}
