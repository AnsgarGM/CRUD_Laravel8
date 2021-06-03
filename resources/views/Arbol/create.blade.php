@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/arbol') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('arbol.form', ['modo'=>'Crear'])

    </form>
</div>
@endsection