<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;

class Provincie extends Model
{
    use HasFactory;

    protected $fillable= [
        'name'
    ];


    public function municipalities(): HasManyAlias
    {
        return $this->hasMany(Municipality::class);
    }

    public function neighborhoods(): HasManyAlias
    {
        return $this->hasMany(Neighborhoods::class);
    }


}
