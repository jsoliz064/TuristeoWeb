@extends('adminlte::page')

@section('title', 'Sitios')

@section('content_header')
  
@stop

@section('content')
<br>
<div class="card">
  <div class="card-body">
    <div align="center">
      <form method="post" action="{{route('sitios.store')}}"  novalidate >
          @csrf
          <h4><B>REGISTRAR SITIO</B></h4>

          <div class="cbp-mc-daniel">
            <input type="text" placeholder="URL" name="url" class="focus border-primary  form-control" >
            @error('url')
              <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror
          </div>
          <div class="cbp-mc-daniel">
            <input type="text" placeholder="descripcion" name="descripcion" class="focus border-primary  form-control" >
            @error('descripcion')
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
      <h4><B>SITIOS REGISTRADAS</B></h4>
    </div>
      <table class="table table-striped" id="ciudads" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">URL</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col" width="20%">Acciones</th>
            {{-- <th colspan=""></th> --}}
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
