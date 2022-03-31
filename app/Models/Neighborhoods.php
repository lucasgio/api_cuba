<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

/**
 * @method static paginate(int $int)
 * @method static create(array $validated)
 */
class Neighborhoods extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'municipalitie_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function municipality(): BelongsToAlias
    {
        return $this->belongsTo(Municipality::class, 'municipalitie_id');
    }
}
