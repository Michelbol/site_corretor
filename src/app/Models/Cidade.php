<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cidade
 *
 * @property int $id
 * @property string $nome
 * @property string $estado
 * @property string $sigla_estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Imovel[] $imoveis
 * @property-read int|null $imoveis_count
 * @method static Builder|Cidade newModelQuery()
 * @method static Builder|Cidade newQuery()
 * @method static Builder|Cidade query()
 * @method static Builder|Cidade whereCreatedAt($value)
 * @method static Builder|Cidade whereEstado($value)
 * @method static Builder|Cidade whereId($value)
 * @method static Builder|Cidade whereNome($value)
 * @method static Builder|Cidade whereSiglaEstado($value)
 * @method static Builder|Cidade whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Cidade extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'nome',
        'estado',
        'sigla_estado',
    ];

    /**
     * @return HasMany
     */
    public function imoveis()
    {
        return $this->hasMany(Imovel::class, 'cidade_id');
    }
}
