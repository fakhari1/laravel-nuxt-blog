<?php

use Illuminate\Support\Facades\Auth;

function me()
{
    return Auth::user() ?? null;
}

function modules_path(string $path): string
{
    return base_path('modules/' . $path);
}
