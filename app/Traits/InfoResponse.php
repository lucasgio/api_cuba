<?php

namespace App\Traits;

trait InfoResponse
{
    public function error(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        return __('An unexpected error has occurred');
    }

    public function resourceSuccess(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        return __('The resource has been created correctly');
    }

    public function resourceList(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        return __('Resource has been listed correctly');
    }

    public function resourceUpdate(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        return __('The resource has been updated correctly');
    }

    public function resourceDelete(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        return __('The resource has been successfully removed');
    }

    public function resourceError(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        return __('The resource could not be created');
    }
}
