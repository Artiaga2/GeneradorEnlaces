@extends('admin.layouts.app')
@push('scripts')
    <script src="{{ asset('js/validacionForm.js') }}" defer></script>
@endpush
@section('content')

    @auth()

        <div class="container my-5 bg-primary text-warning">
            <form action="{{ url('/') }}/crear" method="post">
                {{ csrf_field() }}

                @include('admin.partials.enlaces_form')


                <button id="enviar" class="flex-md-column" type="submit">{{ __('Añadir Enlace') }}</button>
            </form>
        </div>
    @endauth


@endsection