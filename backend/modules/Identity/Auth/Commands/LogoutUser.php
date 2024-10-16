<?php

namespace Modules\Identity\Auth\Commands;

use Illuminate\Support\Facades\Auth;
use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;

class LogoutUser extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {

        if (Auth::check()) {
            auth('sanctum')->user()->currentAccessToken()->delete();

            return Responder::success(null, 'Successfully logged out');
        }

        Responder::throwValidationError('Unauthenticated');
    }
}
