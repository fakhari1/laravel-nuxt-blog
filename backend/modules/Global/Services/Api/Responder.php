<?php

namespace Modules\Global\Services\Api;

use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class Responder
{
    protected static function wrapper($code, $message, $data)
    {
        return Response::json([
            'data' => $data,
            'message' => $message,
            'is_success' => !($code < 200 || $code > 299),
        ], $code);
    }

    public static function response($data, $message = '', $code = 200)
    {
        return self::wrapper($code, $message, $data);
    }

    public static function success($data, $message, $code = 200)
    {
        return self::response($data, $message, $code);
    }

    public static function error($data, $message, $code = 400)
    {
        return self::response($data, $message, $code);
    }

    public static function throwValidationError($messages)
    {
        throw ValidationException::withMessages($messages);
    }
}
