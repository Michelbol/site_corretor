<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Slide
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $descricao
 * @property string $imagem
 * @property string|null $link
 * @property string|null $ordem
 * @property string $publicado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Slide newModelQuery()
 * @method static Builder|Slide newQuery()
 * @method static Builder|Slide query()
 * @method static Builder|Slide whereCreatedAt($value)
 * @method static Builder|Slide whereDescricao($value)
 * @method static Builder|Slide whereId($value)
 * @method static Builder|Slide whereImagem($value)
 * @method static Builder|Slide whereLink($value)
 * @method static Builder|Slide whereOrdem($value)
 * @method static Builder|Slide wherePublicado($value)
 * @method static Builder|Slide whereTitulo($value)
 * @method static Builder|Slide whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Slide extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'link',
        'ordem',
        'publicado',
    ];
}
