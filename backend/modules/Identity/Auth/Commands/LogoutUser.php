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
            Auth::guard('sanctum')->logout();
            request()->user()->currentAccessToken()->delete();

            return Responder::success('', 'Successfully logged out');
        }

        Responder::throwValidationError('Unauthenticated');
    }
}
