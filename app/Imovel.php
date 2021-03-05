<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Imovel
 *
 * @property int $id
 * @property int $tipo_id
 * @property int $cidade_id
 * @property string $titulo
 * @property string $descricao
 * @property string $imagem
 * @property string $status
 * @property string $endereco
 * @property string $cep
 * @property float $valor
 * @property int $dormitorios
 * @property string $detalhes
 * @property string|null $mapa
 * @property int $visualizacoes
 * @property string $publicar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Cidade $cidade
 * @property-read Collection|Galeria[] $galeria
 * @property-read int|null $galeria_count
 * @property-read Tipo $tipo
 * @method static Builder|Imovel newModelQuery()
 * @method static Builder|Imovel newQuery()
 * @method static Builder|Imovel query()
 * @method static Builder|Imovel whereCep($value)
 * @method static Builder|Imovel whereCidadeId($value)
 * @method static Builder|Imovel whereCreatedAt($value)
 * @method static Builder|Imovel whereDescricao($value)
 * @method static Builder|Imovel whereDetalhes($value)
 * @method static Builder|Imovel whereDormitorios($value)
 * @method static Builder|Imovel whereEndereco($value)
 * @method static Builder|Imovel whereId($value)
 * @method static Builder|Imovel whereImagem($value)
 * @method static Builder|Imovel whereMapa($value)
 * @method static Builder|Imovel wherePublicar($value)
 * @method static Builder|Imovel whereStatus($value)
 * @method static Builder|Imovel whereTipoId($value)
 * @method static Builder|Imovel whereTitulo($value)
 * @method static Builder|Imovel whereUpdatedAt($value)
 * @method static Builder|Imovel whereValor($value)
 * @method static Builder|Imovel whereVisualizacoes($value)
 * @mixin Eloquent
 */
class Imovel extends Model
{
    protected $table = "imoveis";

    public function tipo()
    {
        return $this->belongsTo('App\Tipo', 'tipo_id');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Cidade', 'cidade_id');
    }

    public function galeria()
    {
        return $this->hasMany('App\Galeria', 'imovel_id');
    }
}
