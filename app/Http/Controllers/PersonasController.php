<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personas;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PersonasController extends Controller{
    /**
     * Display a listing of the resource.
     *Pagina inicio 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos= Personas::all();
        return view("inicio",compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *Formulario donde agregamos datos
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("agregar");
    }

    /**
     * Store a newly created resource in storage.
     *sirve para guardar datos en la BD
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if ($request->ajax()) {
            //Validaciones BACK
            $validator = Validator::make($request->post(), [
                'nombre' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }
            $personas=new Personas();
            $personas->paterno=$request->paterno;
            $personas->materno=$request->materno;
            $personas->nombre= $request->nombre;
            $personas->fecha_nacimiento=$request->nacimiento;
            if ($personas->save()) {
                return response()->json(['success' => true, 'redirect' => route('personas.index')]);
            } else {
                return response()->json(['success' => false, 'errors' => $personas]);
            }
        }else{
            return response()->json(['success' => false, 'errors' => $request]);
        }
    }

    /**
     * Display the specified resource.
     *Para obtener un registro de nuestra tabla
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas){
        return view("eliminar");
    }

    /**
     * Show the form for editing the specified resource.
     *Nos sirve para obtener los datos que se van a editar y coloca en un formulario
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas){
        return view('actualizar');
    }

    /**
     * Update the specified resource in storage.
     *Actualiza los datos en la BD
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personas $personas){
        //
    }

    /**
     * Remove the specified resource from storage.
     *Elimina un registro
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas){
        //
    }
}
