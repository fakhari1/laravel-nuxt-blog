<?php

namespace Modules\Global\Services\Api;

use Illuminate\Support\Facades\Response;

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

    public static function response(array $data = [], $code, $message = '')
    {
        return self::wrapper($code, $message, $data);
    }
}
