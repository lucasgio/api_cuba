<?php

namespace App\Traits;

trait InfoResponse
{
    public string $error = 'Ha ocurrido un error inesperado';
    public string $resourceSuccess = 'Se ha creado el recurso correctamente';
    public string $resourceList = 'Se ha listado el recurso correctamente';
    public string $resourceUpdate = 'Se ha actualizado el recurso correctamente';
    public string $resourceDelete = 'Se ha eliminado el recurso correctamente';
    public string $resourceError = 'No se ha podido crear el recurso';

}

