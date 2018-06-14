@extends('admin.layouts.app')

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
                    </div>
                    <hr>
                @endforeach
                <nav aria-label="Page navigation example">
                    {{ $enlaces->appends(request()->query())->links() }}
                </nav>

            </div>
        </div>
    </div>
@endsection