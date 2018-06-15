@extends('admin.layouts.app')
@push('scripts')
    <script src="{{ asset('js/delete.js') }}" defer></script>
@endpush
@section('content')

    <div class="container">

        <div class="row col-10">
            @include('admin.partials.sidebar')
            <div class="articles col-9">



                <nav aria-label="Page navigation example">
                    {{ $enlaces->appends(request()->query())->links() }}
                </nav>



                @foreach($enlaces as $enlace)
                    <div class="article">
                        <h5 class="card-title"><a href="/enlaces/{{ $enlace->slug }}">{{ $enlace->titulo }}</a></h5>
                        <p>{{$enlace->tipo}}<a href="{{$enlace->uri}}">{{$enlace->uri}}</a></p>
                        <p align="right" class="blog-post-meta">{{ $enlace->created_at->toFormattedDateString() }}<br>
                            Creado por: <a href="/enlaces/{{ $enlace->user->slug }}"> {{$enlace->user->name}}</a><br>
                            {{$enlace->privacidad}}</p>
                        <p class="excerpt">{{ $enlace->excerpt }}</p>
                        <p>@include('admin.partials.tags')</p>

                        <a href="/enlaces/{{ $enlace->slug }}" class="btn btn-primary">Leer mas</a>
                        <a href="{{ route('enlace.edit', ['slug' => $enlace->slug]) }}">Edit</a>
                        <button name="btnModal" data-idEnlace="{{$enlace->id}}" type="button"
                                class="btn btn-default btn-outline-dark"
                                data-toggle="modal">Borrar</button>
                    </div>
                    <hr>
                @endforeach

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <!-- Modal header-->
                            <h2 class="modal-header" style="padding:35px 50px;">
                                Confirmar borrado de enlace
                            </h2>
                            <!-- Modal body-->
                            <div class="modal-body text-center">
                                <p>
                                    ¿Está seguro de querer borrar este enlace?
                                </p>
                            </div>
                            <!-- Modal footer-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger btn-default pull-center"
                                        data-dismiss="modal">
                                    <i class="fa fa-remove text-light"></i> Cancelar
                                </button>

                                <button id="enviar" type="submit"
                                        class="btn btn-success btn-default pull-center"
                                        data-idEnlaceEnviar="">
                                    <i class="fas fa-chevron-right text-light"></i> Aceptar
                                </button>
                                <!-- </form>-->
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    {{ $enlaces->appends(request()->query())->links() }}
                </nav>

            </div>
        </div>
    </div>
@endsection