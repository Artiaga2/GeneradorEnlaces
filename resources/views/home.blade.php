@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <table id="tablaEnlaces" class="table table-dark table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Titulo</th>
                <th>Tipo</th>
                <th>Descripcion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enlaces as $enlace)
                <tr>
                    <td>
                        {{$enlace->titulo}}
                    </td>
                    <td>{{$enlace->tipo}}</td>
                    <td>{{$enlace->descripcion}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
