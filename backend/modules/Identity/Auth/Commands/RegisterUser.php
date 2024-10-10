<?php

namespace Modules\Identity\Auth\Commands;

use Modules\Global\Extendables\BaseCommandAction;
use Modules\Identity\User\Models\User;

class RegisterUser extends BaseCommandAction
{
    public function handle($attributes = []): User
    {

    }

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mobile' => ['required'],
            'password' => ['required'],
        ];
    }
}
