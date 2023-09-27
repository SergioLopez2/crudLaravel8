@extends('layout/plantilla')
@section('tituloPagina',"Eliminar persona")
    @section('contenido')
    <div class="card">
      <div class="card-header">
        Eliminar persona
      </div>
      <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estas seguro de eliminar el registro!!!

                <table class="table table-sm table-hover">
                    <thead>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimienton</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <form action="">
                    <a href="{{route('personas.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                    <button class="btn btn-danger"> <i class="fa-solid fa-user-xmark"></i> Eliminar</button>
                </form>
            </div>
        </p>
      </div>
    </div>
        
    @endsection