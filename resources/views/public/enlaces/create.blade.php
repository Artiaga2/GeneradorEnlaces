@extends('public.layouts.app')

@section('content')

    @auth()

        <div class="container my-5 bg-primary text-warning">
            <form action="{{ url('/') }}/crear" method="post">
                {{ csrf_field() }}
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

                <div class="form-group @if( $errors->has('tipo'))has-error @endif">
                    <label for="tipo" class="col-md-4 control-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Introduce un tipo">
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

                <button class="flex-md-column" type="submit">Enviar</button>
            </form>
        </div>
    @endauth

    @push('scripts')
        <script src="{{ asset('js/validaciones/validacion.js') }}" defer></script>
    @endpush

@endsection