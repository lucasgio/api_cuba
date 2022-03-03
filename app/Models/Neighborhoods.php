<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

class Neighborhoods extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'municipalitie_id',
        'provincie_id',
    ];


    public function municipalities(): BelongsToAlias
    {
        return $this->belongsTo(Municipality::class,'municipalitie_id');
    }

    public function provincies(): BelongsToAlias
    {
        return $this->belongsTo(Provincie::class,'provincie_id');
    }

}
