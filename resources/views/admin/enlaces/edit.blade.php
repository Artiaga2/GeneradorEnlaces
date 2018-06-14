@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row main-area">
            <div class="col-md-9">
                <h1>Editar Enlace</h1>

                <form method="POST" action="{{ route('enlaces.patch', ['slug' => $enlace->slug ]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    @include('admin.partials.enlaces_form')

                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
