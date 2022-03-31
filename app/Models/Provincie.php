<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;

/**
 * @method static paginate(int $int)
 * @method static create(array $validated)
 * @method static insert(array $validated)
 */
class Provincie extends Model
{
    use HasFactory;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'string',
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
