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
                        <a href="{{$enlace->uri}}">{{$enlace->uri}}</a>
                        <p align="right" class="blog-post-meta">{{ $enlace->created_at->toFormattedDateString() }}<br>
                            Creado por: <a href="/enlaces/{{ $enlace->user->slug }}"> {{$enlace->user->name}}</a></p>
                        <p class="excerpt">{{ $enlace->excerpt }}</p>
                        <p>@include('admin.partials.tags')</p>
                        <a href="/enlaces/{{ $enlace->slug }}" class="btn btn-primary">Read more</a>
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