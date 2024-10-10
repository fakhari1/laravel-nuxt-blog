<?php

namespace Modules\Identity\Auth\Queries;

use Lorisleiva\Actions\ActionRequest;
use Modules\Global\Extendables\BaseAction;
use Modules\Identity\User\Models\User;

class GetAuthUserResource extends BaseAction
{

    public function handle(ActionRequest $request): User
    {
        return $request->user();
    }

}
