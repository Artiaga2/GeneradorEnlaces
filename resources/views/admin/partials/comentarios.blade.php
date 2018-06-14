<div class="comentarios">
    <h3>comentarios</h3>
    <div>
        <div class="card-block">
            <form action="/enlaces/{{ $enlace->id }}/comentarios" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control {{ $errors->has('mensaje') ? 'is-invalid' : '' }}" name="mensaje" id="mensaje" placeholder="Your comment here" required>{{ old('mensaje') }}</textarea>
                    @if( $errors->has('mensaje') )
                        <div class="invalid-feedback">
                            {{ $errors->first('mensaje') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Commentario</button>
                </div>
            </form>
        </div>
    </div>
    <ul class="list-group">
        @foreach( $enlace->comentarios as $comentario)
            <li class="list-group-item">
                <p><strong>{{ $comentario->created_at->diffForHumans() }}</strong> by <strong>{{ $enlace->user->name}}</strong> </p>
                <p>
                    {{ $comentario->mensaje }}
                </p>
            </li>
        @endforeach
    </ul>

</div>