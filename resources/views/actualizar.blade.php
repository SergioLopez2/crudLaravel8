@extends('layout/plantilla')
@section('tituloPagina',"Actualziar Persona")
    @section('contenido')
    <div class="card">
      <div class="card-header">
        Actualizar persona
      </div>
      
      <div class="card-body">
        <p class="card-text">
            <form >
              @csrf
                <label for="" >Apellido Paterno</label>
                <input type="text" name="paterno" id="paterno" class="form-control" required value="{{session('persona.paterno')}}">
                <label for="" >Apellido Materno</label>
                <input type="text" name="materno" id="materno" class="form-control" required value="{{session('persona.materno')}}">
                <label for="" >Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required value="{{session('persona.nombre')}}">
                <label for="" >Fecha Nacimiento</label>
                <input type="date" name="nacimiento" id="nacimiento" class="form-control" required value="{{session('persona.fecha_nacimiento')}}">
                <br>
                <a href="{{route('personas.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                <button class="btn btn-warning bt-updateProcess" data-idup="{{session('persona.id')}}" ><i class="fa-solid fa-user-pen"></i> Actualizar</button>
            </form>
        </p>
      </div>
    </div>
    <script async src="{{asset('js/fnc_actualizar.js')}}"></script>
    @endsection