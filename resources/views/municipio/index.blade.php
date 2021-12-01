@extends('adminlte::page')

@section('title', 'Ciudad')

@section('content_header')
  
@stop

@section('content')
<br>
<div class="card">
  <div class="card-body">
    <div align="center">
      <form method="post" action="{{route('municipios.store')}}"  novalidate >
          @csrf
          <h4><B>REGISTRAR MUNICIPIO</B></h4>

          <div class="cbp-mc-daniel">
            <input type="text" placeholder="Nombre" name="nombre" class="focus border-primary  form-control" >
            @error('nombre')
              <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror
          </div>
          
          <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
      </form>
    </div>
  </div>
</div>
<br>
<div class="card">
  <div class="card-body">
    <div align="center">
      <h4><B>MUNICIPIOS REGISTRADAS</B></h4>
    </div>
      <table class="table table-striped" id="ciudads" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col" width="20%">Acciones</th>
          </tr>
        </thead>
        
        <tbody>
          
        </tbody> 

      </table>
    </div>
  </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{asset('css/cruds.css')}}">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
     $('#ciudads').DataTable();
    } );
</script>
@stop
