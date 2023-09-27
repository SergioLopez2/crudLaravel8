@extends('layout/plantilla')
@section('tituloPagina',"Crear Nuevo")
    @section('contenido')
    <div class="card">
      <div class="card-header">
        Agregar nuevo
      </div>
      <div class="card-body">
        <p class="card-text">
            <form id="btn-registro">
                @csrf
                <label for="" >Apellido Paterno</label>
                <input type="text" id="paterno" name="paterno" class="form-control" >
                <label for="" >Apellido Materno</label>
                <input type="text" id="materno" name="materno" class="form-control" >
                <label for="" >Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" >
                <label for="" >Fecha Nacimiento</label>
                <input type="date" id="nacimiento" name="nacimiento" class="form-control" >
                <br>
                <a href="{{route('personas.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                <button class="btn btn-primary" type="submit"> <i class="fa-solid fa-user-plus"></i> Agregar</button>
            </form>
        </p>
      </div>
    </div>
    <script>
          var personasStoreRoute = "{{ route('personas.store') }}";
    </script>
    <script async src="{{asset('js/fnc_registro.js')}}"></script>
    @endsection