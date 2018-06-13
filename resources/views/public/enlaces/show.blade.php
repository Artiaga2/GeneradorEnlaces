@extends('public.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="articles col-9">
                <div class="article">
                    <h2 class="card-title">{{ $enlace->titulo }}</h2>
                    <p class="enlace-meta">{{ $enlace->created_at->toFormattedDateString() }}</p>
                    <p class="uri">{{ $enlace->uri }}</p>
                    <p class="tipo">{{ $enlace->tipo }}</p>
                    <p class="descripcion">{{ $enlace->descripcion }}</p>

                    @include('admin.partials.tags')
                </div>
                <hr>
                {{--@include('public.partials.comments')--}}
            </div>
            @include('admin.partials.sidebar')
        </div>
    </div>
@endsection