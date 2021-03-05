<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Tipo
 *
 * @property int $id
 * @property string $titulo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Imovel[] $imoveis
 * @property-read int|null $imoveis_count
 * @method static Builder|Tipo newModelQuery()
 * @method static Builder|Tipo newQuery()
 * @method static Builder|Tipo query()
 * @method static Builder|Tipo whereCreatedAt($value)
 * @method static Builder|Tipo whereId($value)
 * @method static Builder|Tipo whereTitulo($value)
 * @method static Builder|Tipo whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Tipo extends Model
{
    public function imoveis()
    {
        return $this->hasMany('App\Imovel', 'tipo_id');
    }
}
