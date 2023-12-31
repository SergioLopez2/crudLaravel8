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
    public function show(){
        $id= $_POST['idEliminar'];
        if ($_POST) {
            if (!is_numeric($id) || $id<=0) {
                return response()->json(['success' => false, 'errors' => $_POST]);
            }
            $dato=Personas::find($id);//Busca el valor en el modelo PERSONAS
            if (!$dato) {
                return response()->json(['success' => false, 'errors' => $dato]);
            }
            if ($dato->delete()) {
                return response()->json(['success' => true, 'redirect' => route('personas.index')]);
            } else {
                return response()->json(['success' => false, 'errors' => $dato]);
            }
            //print("<pre>" . print_r(, true) . "</pre>");
        } else {
            return response()->json(['success' => false, 'errors' => $_POST]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *Nos sirve para obtener los datos que se van a editar y coloca en un formulario
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //print("<pre>" . print_r($id, true) . "</pre>");
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'errors' => $id]);
        }
        $dato = Personas::find($id); //Busca el valor en el modelo PERSONAS
        if (!$dato) {
            return response()->json(['success' => false, 'errors' => $dato]);
        }
        session(['persona' => $dato]);
        return response()->json(['success' => true, 'redirect' => route('personas.vistaUpdate')]);
    }

    /**
     * Update the specified resource in storage.
     *Actualiza los datos en la BD
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function vistaUpdate(){
        return view('actualizar');
    }
    public function update(Request $request,$id){
        //print("<pre>" . print_r($id, true) . "</pre>");
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['success' => false, 'errors' => $id]);
        }
        $personas = Personas::findOrFail($id); //Busca el valor en el modelo PERSONAS
        if (!$personas) {
            return response()->json(['success' => false, 'errors' => $personas]);
        }
        $personas->paterno = $request->input('paterno');
        $personas->materno = $request->input('materno');
        $personas->nombre = $request->input('nombre');
        $personas->fecha_nacimiento = $request->input('nacimiento');
        if ($personas->save()) {
            session()->forget('persona');
            return response()->json(['success' => true, 'redirect' => route('personas.index')]);
        } else {
            return response()->json(['success' => false, 'errors' => $personas]);
        }
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
