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
            $user = $request->user();
            return Responder::success([
                'user' => $user,
                'token' => $user->currentAccessToken(),
//                'token' => $user->tokens()->where('personal_access_tokens.name', $user->mobile)->first(),
                'bearer_token' => $request->bearerToken(),
            ], [
                'User still logged in'
            ]);
        }

        Responder::throwValidationError('Unauthenticated');
    }
}
