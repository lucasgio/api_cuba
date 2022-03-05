<?php

namespace App\Traits;

trait InfoResponse
{
    public string $error = __('An unexpected error has occurred');
    public string $resourceSuccess = __('The resource has been created correctly');
    public string $resourceList = __('Resource has been listed correctly');
    public string $resourceUpdate = __('The resource has been updated correctly');
    public string $resourceDelete = __('The resource has been successfully removed');
    public string $resourceError = __('The resource could not be created');

}

