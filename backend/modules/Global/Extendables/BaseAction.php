<?php

namespace Modules\Global\Extendables;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class BaseAction
{
    use AsAction;
    use WithAttributes;

    public bool $needAuthorization = true;

    public function setAsControllerInitialAttributes(ActionRequest $request)
    {
        $this->fillFromRequest($request);
        $this->validateAttributes();
    }

    public function sampleHandle(array $attributes)
    {
        $this->fill($attributes);
        $this->needAuthorization = false;
        $this->validateAttributes();

    }
    protected function handleThrowable(\Throwable $exception)
    {
        Log::error($exception);
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            throw $exception;
        }

        if (app()->environment('local', 'development','testing')) {
            throw $exception;
        }

        try {
            $serializedException = serialize($exception);
        } catch (\Exception $e) {
            $serializedException = $exception->__toString();
        }

        return ValidationException::withMessages($serializedException);
    }
}
