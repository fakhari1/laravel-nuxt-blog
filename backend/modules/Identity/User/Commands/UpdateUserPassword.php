<?php

namespace Modules\Identity\User\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;
use Modules\Identity\User\Models\User;

class UpdateUserPassword extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $user = User::findOrFail($attributes['user_id']);

        if (!Hash::check($attributes['password'], $user->password)) {
            Responder::throwValidationError(['Current password is incorrect']);
        }

        return $user->update([
           'password' => Hash::make($attributes['new_password'])
        ]);
    }

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'password' => ['required', 'confirmed'],
            'new_password' => ['required']
        ];
    }
}
