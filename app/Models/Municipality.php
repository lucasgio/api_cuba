<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;

/**
 * @method static paginate(int $int)
 * @method static create(array $validated)
 */
class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'provincie_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];


    public function provincie(): BelongsToAlias
    {
        return $this->belongsTo(Provincie::class, 'provincie_id');
    }

    public function neighborhoods(): HasManyAlias
    {
        return $this->hasMany(Neighborhoods::class);
    }
}
