<?php

namespace App\Traits;

trait InfoResponse
{
    public function error()
    {
        return __('An unexpected error has occurred');
    }

    public function resourceSuccess()
    {
        return __('The resource has been created correctly');
    }

    public function resourceList()
    {
        return __('Resource has been listed correctly');
    }

    public function resourceUpdate()
    {
        return __('The resource has been updated correctly');
    }

    public function resourceDelete()
    {
        return __('The resource has been successfully removed');
    }

    public function resourceError()
    {
        return __('The resource could not be created');
    }
}
