@extends('admin.layouts.app')

@section('content')

    @auth()

        <div class="container my-5 bg-primary text-warning">
            <form action="{{ url('/') }}/crear" method="post">
                {{ csrf_field() }}

                @include('admin.partials.enlaces_form')


                <button class="flex-md-column" type="submit">Enviar</button>
            </form>
        </div>
    @endauth

    @push('scripts')
        <script src="{{ asset('js/validaciones/validacion.js') }}" defer></script>
    @endpush

@endsection