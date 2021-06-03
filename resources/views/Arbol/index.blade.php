@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <a href="{{ url('arbol/create') }}" class="btn btn-success">Registrar nuevo</a><br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>Código Postal</th>
                <th>Delegación</th>
                <th>Foto</th>
                <th>Especie</th>
                <th>Edad</th>
                <th>Status</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $arboles as $arbol )
            <tr>
                <td>{{ $arbol->id }}</td>
                <td>{{ $arbol->Calle }}</td>
                <td>{{ $arbol->Colonia }}</td>
                <td>{{ $arbol->CodigoPostal }}</td>
                <td>{{ $arbol->Delegacion }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$arbol->Foto }}" width="200" alt="" class="img-thumbnail img-fluid">
                </td>

                <td>{{ $arbol->Especie }}</td>
                <td>{{ $arbol->Edad }}</td>
                <td>{{ $arbol->Status }}</td>
                <td>
                    <a href="{{ url('/arbol/'.$arbol->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    <br><br>
                    <form action="{{ url( '/arbol/'.$arbol->id ) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $arboles->links() !!}
</div>
@endsection