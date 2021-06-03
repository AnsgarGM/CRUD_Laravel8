@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/arbol/'.$arbol->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('arbol.form', ['modo'=>'Editar'])

    </form>
</div>
@endsection