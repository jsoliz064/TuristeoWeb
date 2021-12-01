@extends('adminlte::page')

@section('title', 'Ciudades')

@section('content_header')
    <h1>Registrar Ciudad</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('ciudads.store')}}" novalidate >

            @csrf
            
            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" class="focus border-primary  form-control" >
            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror
 
            <br>
            <br>
            
            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{route('ciudads.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
