<?php

namespace Modules\Identity\User\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;
use Modules\Identity\User\Models\User;

class UpdateUser extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $user = User::findOrFail($attributes['user_id']);

        $user->update([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'tagline' => $attributes['tagline'],
            'about' => $attributes['about'],
            'username' => $attributes['username'],
            'formatted_address' => $attributes['formatted_address'],
        ]);

        return [
            'user' => $user
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'tagline' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'about' => ['required'],
            'username' => ['required'],
            'formatted_address' => ['required'],
        ];
    }
}
