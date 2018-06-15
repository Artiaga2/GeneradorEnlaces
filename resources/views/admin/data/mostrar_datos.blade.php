@extends('admin.layouts.app')

@push('scripts')
    <script src="{{ asset('js/cargarVistas.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-info mx-auto" href="{{ url('/data/mostrar_datos') }}">
                <i class="fas fa-sync-alt"></i>
                {{ __('Recargar la página') }}
            </a>

            <button id="mostrar" type="submit" class="btn btn-success mx-2">
                {{ __('Cargar datos') }}
            </button>

            <button id="mostrarUno" type="submit" class="btn btn-info mx-auto">
                {{ __('Cargar uno a uno los datos') }}
            </button>

            <button id="mostrarVista" type="submit" class="btn btn-warning mx-5">
                {{ __('Cargar vista') }}
            </button>
        </div>
        <br>
        <div id="enlacesList"></div>
    </div>
@endsection