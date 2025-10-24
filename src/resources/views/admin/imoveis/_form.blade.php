<div class="input-field">
    <input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo) ? $registro->titulo : ''}}" maxlength="191">
    <label>Título</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : ''}}" maxlength="191">
    <label>Descrição</label>
</div>

<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
        @if(isset($registro->imagem))
            <img width="120" src="{{asset($registro->imagem)}}">
        @endif
    </div>
</div>


<div class="input-field col s12">
    <select name="status">
        <option value="aluga" {{(isset($registro->status) && $registro->status == 'aluga' ? 'selected' : '')}}>Aluga</option>
        <option value="vende" {{(isset($registro->status) && $registro->status == 'vende' ? 'selected' : '')}}>Vende</option>
    </select>
    <label>Status</label>
</div>

<div class="input-field col s12">
    <select name="tipo_id">
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{(isset($registro->tipo_id) && $registro->tipo_id == $tipo->id ? 'selected' : '')}}>{{ $tipo->titulo }}</option>
        @endforeach
    </select>
    <label>Tipo de Imóvel</label>
</div>

<div class="input-field col s12">
    <input type="text" name="endereco" class="validate" value="{{(isset($registro->endereco) ? $registro->endereco : '')}}" maxlength="191">
    <label>Endereco</label>
</div>

<div class="input-field col s12">
    <input type="text" name="cep" class="validate" value="{{(isset($registro->cep) ? $registro->cep : '')}}" maxlength="191">
    <label>CEP (Ex:85.609-490)</label>
</div>

<div class="input-field col s12">
    <select name="cidade_id">
        @foreach($cidades as $cidade)
            <option value="{{ $cidade->id }}" {{(isset($registro->cidade_id) && $registro->cidade_id == $cidade->id ? 'selected' : '')}}>{{$cidade->nome}}</option>
        @endforeach
    </select>
    <label>Cidade</label>
</div>

<div class="input-field col s12">
    <input type="text" name="valor" class="validate money" value="{{(isset($registro->valor) ? $registro->valor : '')}}" maxlength="15">
    <label>Valor (Ex:200034,90)</label>
</div>

<div class="input-field col s12">
    <input type="text" name="dormitorios" class="validate" value="{{(isset($registro->dormitorios) ? $registro->dormitorios : '')}}" maxlength="191">
    <label>Dormitórios (Ex: 3)</label>
</div>

<div class="input-field col s12">
    <input type="text" name="detalhes" class="validate" value="{{(isset($registro->detalhes) ? $registro->detalhes : '')}}" maxlength="191">
    <label>Detalhes (Ex: Sacada: 1 - Banheiro: 2 - Sala De Jantar - Churrasqueira</label>
</div>

<div class="input-field col s12">
    <textarea name="mapa" class="materialize-textarea">
        {{(isset($registro->mapa) ? $registro->mapa : '')}}
    </textarea>
    <label>Mapa (Cole o iFrame do Google Maps</label>
</div>

<div class="input-field col s12">
    <select name="publicar">
        <option value="Nao" {{(isset($registro->publicar) && $registro->publicar == 'Nao' ? 'selected' : '')}}>Não</option>
        <option value="Sim" {{(isset($registro->publicar) && $registro->publicar == 'Sim' ? 'selected' : '')}}>Sim</option>
    </select>
    <label>Publicar?</label>
</div>


