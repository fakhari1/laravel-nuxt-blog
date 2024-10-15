<?php

namespace Modules\Identity\Auth\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Global\Extendables\BaseCommandAction;
use Modules\Global\Services\Api\Responder;
use Modules\Identity\User\Models\User;

class LoginUser extends BaseCommandAction
{
    public function execute(array $attributes = [])
    {
        $user = null;
        $user = User::where('mobile', $attributes['mobile'])->first();

        if (!$user) {
            $user = User::create([
                'mobile' => $attributes['mobile'],
                'password' => Hash::make($attributes['password'])
            ]);
        }

        if ($user) {
            $user = Auth::attempt([
                'mobile' => $attributes['mobile'],
                'password' => $attributes['password']
            ]);

            $user = Auth::user();

            $token = $user->createToken('$user$token')->plainTextToken;

            return Responder::success([
                'token' => $token,
                'user' => $user
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
