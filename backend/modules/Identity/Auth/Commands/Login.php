<?php

namespace Modules\Identity\Auth\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;
use Modules\Identity\User\Models\User;

class Login extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $user = User::where('mobile', $attributes['mobile'])->first();

        if (!$user) {
            User::create([
                'mobile' => $attributes['mobile'],
                'password' => Hash::make($attributes['password'])
            ]);
        }

        if (Auth::attempt($attributes)) {
            $token = me()->createToken(me()->mobile)->plainTextToken;
            return Responder::success([
                'token' => $token,
                'user' => me()
            ], 'User logged in successfully');
        }

        Responder::throwValidationError('Unauthorized');
    }

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mobile' => ['required', 'max:11'],
            'password' => ['required'],
        ];
    }
}
