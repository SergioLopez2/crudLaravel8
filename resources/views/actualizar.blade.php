@extends('layout/plantilla')
@section('tituloPagina',"Actualziar Persona")
    @section('contenido')
    <div class="card">
      <div class="card-header">
        Actualizar persona
      </div>
      <div class="card-body">
        <p class="card-text">
            <form action="">
                <label for="" >Apellido Paterno</label>
                <input type="text" name="paterno" class="form-control" required>
                <label for="" >Apellido Materno</label>
                <input type="text" name="materno" class="form-control" required>
                <label for="" >Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
                <label for="" >Fecha Nacimiento</label>
                <input type="date" name="nacimiento" class="form-control" required>
                <br>
                <a href="{{route('personas.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                <button class="btn btn-warning" ><i class="fa-solid fa-user-pen"></i> Actualizar</button>
            </form>
        </p>
      </div>
    </div>
        
    @endsection