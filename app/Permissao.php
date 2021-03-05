<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Permissao
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Papel[] $papeis
 * @property-read int|null $papeis_count
 * @method static Builder|Permissao newModelQuery()
 * @method static Builder|Permissao newQuery()
 * @method static Builder|Permissao query()
 * @method static Builder|Permissao whereCreatedAt($value)
 * @method static Builder|Permissao whereDescricao($value)
 * @method static Builder|Permissao whereId($value)
 * @method static Builder|Permissao whereNome($value)
 * @method static Builder|Permissao whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Permissao extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }
}
