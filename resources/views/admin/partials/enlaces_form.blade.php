<div class="form-group @if( $errors->has('titulo'))has-error @endif">
    <label for="titulo" class="col-md-4 control-label">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Introduce un titulo">
</div>
@if($errors->has('titulo'))
    @foreach($errors->get('titulo') as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach
@endif

<div class="form-group @if( $errors->has('uri'))has-error @endif">
    <label for="uri" class="col-md-4 control-label">Url</label>
    <input type="text" class="form-control" id="uri" name="uri" placeholder="Introduce un url">
</div>
@if($errors->has('uri'))
    @foreach($errors->get('uri') as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach
@endif

<div class="form-group @if( $errors->has('tipo'))has-error @endif">
    <label for="tipo" class="col-md-4 control-label">Tipo</label>
    <select class="form-control" id="tipo" name="tipo">
        <option value="enlace">Enlace</option>
        <option value="PDF">PDF</option>
        <option value="imagen">Imagen</option>
        <option value="nota">Nota</option>
    </select>
</div>
@if($errors->has('tipo'))
    @foreach($errors->get('tipo') as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach
@endif


<div class="form-group @if( $errors->has('descripcion'))has-error @endif">
    <label for="descripcion" class="col-md-4 control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Introduce una descripcion">
</div>
@if($errors->has('descripcion'))
    @foreach($errors->get('descripcion') as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach

@endif

<div class="form-group @if( $errors->has('privacidad'))has-error @endif">
    <label for="privacidad" class="col-md-4 control-label">Privacidad</label>
    <select class="form-control" id="privacidad" name="privacidad">
        <option value="publico">Publico</option>
        <option value="privado">Privado</option>
    </select>
</div>
@if($errors->has('privacidad'))
    @foreach($errors->get('privacidad') as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach

@endif


<div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" id="tags" name="tags" value="{{ $tags or old('tags') }}">
    <small id="tagsHelp" class="form-text text-muted">Añade tags</small>
    @if( $errors->has('tags') )
        <div class="invalid-feedback">
            {{ $errors->first('tags') }}
        </div>
    @endif
</div>