<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Pagina
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property string $texto
 * @property string|null $imagem
 * @property string|null $mapa
 * @property string|null $email
 * @property string $tipo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Pagina newModelQuery()
 * @method static Builder|Pagina newQuery()
 * @method static Builder|Pagina query()
 * @method static Builder|Pagina whereCreatedAt($value)
 * @method static Builder|Pagina whereDescricao($value)
 * @method static Builder|Pagina whereEmail($value)
 * @method static Builder|Pagina whereId($value)
 * @method static Builder|Pagina whereImagem($value)
 * @method static Builder|Pagina whereMapa($value)
 * @method static Builder|Pagina whereTexto($value)
 * @method static Builder|Pagina whereTipo($value)
 * @method static Builder|Pagina whereTitulo($value)
 * @method static Builder|Pagina whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Pagina extends Model
{
    //
}
