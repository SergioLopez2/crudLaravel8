@extends('layout/plantilla')
@section('tituloPagina', "Crud con Laravel 8")
    @section('contenido')
        <div class="card">
            <div class="card-header">
                Crud con Larave 8 y MySql
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Listado de personas</h5>
                <p>
                    <a class="btn btn-primary" href="{{route("personas.create")}}"> <i class="fa-solid fa-user-plus"></i> Agregar persona</a>
                </p>
                <hr>
                <p class="card-text">
                    <div class="table table-responsive text-center">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombre</th>
                                <th>Fecha Nacimiento</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @csrf
                                @foreach ($datos as $dato)
                                    <tr>
                                        <td>{{$dato->paterno}}</td>
                                        <td>{{$dato->materno}}</td>
                                        <td>{{$dato->nombre}}</td>
                                        <td>{{$dato->fecha_nacimiento}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"><i class="fa-solid fa-user-pen"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm bt-delete" data-idd="{{$dato->id}}"><i class="fa-solid fa-user-xmark" ></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </p>
            </div>
        </div>
        <script async src="{{asset('js/fnc_eliminar.js')}}"></script>
    @endsection