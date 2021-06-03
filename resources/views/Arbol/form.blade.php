<h1>{{ $modo }} arbol</h1>

@if( count($errors) > 0 )

<div class="alert alert-danger" role="alert">
    <ul>

        @foreach( $errors->all() as $error )
        <li> {{ $error }} </li>
        @endforeach

    </ul>
</div>
@endif

<div class="form-group">
    <label for="Calle">Calle</label>
    <input type="text" name="Calle" class="form-control" id="Calle" value="{{ isset($arbol->Calle)?$arbol->Calle:old('Calle') }}">
</div>

<div class="form-group">
    <label for="Colonia">Colonia</label>
    <input type="text" name="Colonia" class="form-control" id="Colonia" value="{{ isset($arbol->Colonia)?$arbol->Colonia:old('Colonia') }}">
</div>

<div class="form-group">
    <label for="CodigoPostal">Código Postal</label>
    <input type="number" name="CodigoPostal" class="form-control" id="CodigoPostal" value="{{ isset($arbol->CodigoPostal)?$arbol->CodigoPostal:old('CodigoPostal') }}">
</div>

<div class="form-group">
    <label for="Delegacion">Delegación</label>
    <input type="text" name="Delegacion" class="form-control" id="Delegacion" value="{{ isset($arbol->Delegacion)?$arbol->Delegacion:old('Delegacion') }}">
</div>

<div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($arbol->Foto))
    <img src="{{ asset('storage').'/'.$arbol->Foto }}" class="img-thumbnail img-fluid" width="100" alt="">
    @endif
    <input type="file" name="Foto" class="form-control" id="Foto">
</div>

<div class="form-group">
    <label for="Especie">Especie</label>
    <input type="text" name="Especie" class="form-control" id="Especie" value="{{ isset($arbol->Especie)?$arbol->Especie:old('Especie') }}">
</div>

<div class="form-group">
    <label for="Edad">Edad</label>
    <input type="number" name="Edad" class="form-control" id="Edad" value="{{ isset($arbol->Edad)?$arbol->Edad:old('Edad') }}">
</div>

<div class="form-group">
    <label for="Status">Status</label>
    <input type="text" name="Status" class="form-control" id="Status" value="{{ isset($arbol->Status)?$arbol->Status:old('Status') }}">
</div>

<input type="submit" class="btn btn-success" value="{{$modo}}">

<a href="{{ url('arbol/') }}" class="btn btn-primary">Atras</a>