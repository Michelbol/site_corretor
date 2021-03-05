<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Papel
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Permissao[] $permissoes
 * @property-read int|null $permissoes_count
 * @method static Builder|Papel newModelQuery()
 * @method static Builder|Papel newQuery()
 * @method static Builder|Papel query()
 * @method static Builder|Papel whereCreatedAt($value)
 * @method static Builder|Papel whereDescricao($value)
 * @method static Builder|Papel whereId($value)
 * @method static Builder|Papel whereNome($value)
 * @method static Builder|Papel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Papel extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function adicionarPermissao($permissao)
    {
        return $this->permissoes()->save($permissao);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    public function removerPermissao($permissao)
    {
        return $this->permissoes()->detach($permissao);
    }
}
