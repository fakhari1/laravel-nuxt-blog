<?php

namespace Modules\Identity\Auth\Queries;

use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\ActionRequest;
use Modules\Global\Extendables\BaseAction;
use Modules\Global\Services\Api\Responder;

class GetAuthUserResource extends BaseAction
{
    public function handle(ActionRequest $request)
    {
        if (Auth::check()) {
            return Responder::success([
                'user' => $request->user()
            ], [
                'User still logged in'
            ]);
        }

        Responder::throwValidationError('Unauthenticated');
    }
}
