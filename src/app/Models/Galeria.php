<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Galeria
 *
 * @property int $id
 * @property int $imovel_id
 * @property string|null $titulo
 * @property string|null $descricao
 * @property string $imagem
 * @property string|null $ordem
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Imovel $imovel
 * @method static Builder|Galeria newModelQuery()
 * @method static Builder|Galeria newQuery()
 * @method static Builder|Galeria query()
 * @method static Builder|Galeria whereCreatedAt($value)
 * @method static Builder|Galeria whereDescricao($value)
 * @method static Builder|Galeria whereId($value)
 * @method static Builder|Galeria whereImagem($value)
 * @method static Builder|Galeria whereImovelId($value)
 * @method static Builder|Galeria whereOrdem($value)
 * @method static Builder|Galeria whereTitulo($value)
 * @method static Builder|Galeria whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Galeria extends Model
{
    /**
     * @var string[]
     */
    protected $fillable =[
        'imovel_id',
        'titulo',
        'descricao',
        'imagem',
        'ordem',
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'imovel_id');
    }
}
