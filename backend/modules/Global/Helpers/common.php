<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Access\Response;

function me()
{
    return Auth::user() ?? null;
}

function modules_path(string $path): string
{
    return base_path('modules/' . $path);
}

function gate_authorization(string $ability, Model $model): Response
{
    return Gate::authorize($ability, $model);
}
