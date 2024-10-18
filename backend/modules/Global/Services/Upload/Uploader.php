<?php

namespace Modules\Global\Services\Upload;

use Carbon\Carbon;

class Uploader
{
    public const GENERATE_NEW_NAME = 'generate_new_name';
    private static string $fileName;
    private static string $filePath;

    public function __construct($requestFileName, $path, $name, $isPublic)
    {
        $file = request()->file($requestFileName);

        return self::wrapper($file, $path, $name, $isPublic);
    }

    protected function wrapper($file, $path, $name, $isPublic)
    {
        if ($name === Uploader::GENERATE_NEW_NAME) {
            $fileName = implode('-', [
                Carbon::parse(now())->year,
                Carbon::parse(now())->month,
                Carbon::parse(now())->day,
                time(),
            ]);
        } else {
            $fileName = $name;
        }

        $fileName .= '.' . $file->getClientOriginalExtension();

        self::$fileName = $fileName;
        self::$filePath = $path . '/';
        return $file->storeAs($path, $fileName, $isPublic ? 'public' : 'private');
    }

    public static function put($requestFileName, $path = '/', $name = '', $isPublic = true)
    {
        new self(
            $requestFileName,
            $path,
            $name,
            $isPublic
        );

        return self::$filePath . self::$fileName;
    }
}
