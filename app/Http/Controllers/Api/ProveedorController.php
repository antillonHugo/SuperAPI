<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //guardamos en $proveedor todos los registros de la tabla proveedor
        $proveedor = Proveedor::all();

        // Verificamos si hay registros en la colección si esta vacío entrara al if
        if($proveedor->isEmpty()){
            return response()->json(['message'=>'No se encontrarón proveedores','status'=>404],404);
        }

        // Se prepara un array asociativo con los datos y un código de estado HTTP
        $arrayData=[
            'proveedor' => $proveedor,
            'status' => 200
        ];

        // Se devuelve una respuesta JSON con el array $data y un código de estado 200
        return response()->json( $arrayData,200);
    }

   /**
     * se utiliza para guardar registros en la base de datos.
     */
    public function store(Request $request)
    {
        //validamos que todos los campos de la tabla se llenen
        $validator = Validator::make($request->all(),
            ['proveedor_nombre'=> 'required|max:100',
             'proveedor_telefono'=> 'required|digits:8',
             'proveedor_direccion'=> 'required|max:255'
            ]
        );

        //validamos que todos los campos esten correctos
        if($validator->fails()){
            $data = [
                'message' => '',
                'errors'  => $validator->errors(),
                'status'  => 400
            ];

            return response()->json($data,400);
        }

        //si los campos estan correctos(llenos) medinate un array asociativo
        //create es de eloquent
        $proveedor = Proveedor::create([
            'proveedor_nombre'=>$request->proveedor_nombre ,
            'proveedor_telefono'=>$request->proveedor_telefono,
            'proveedor_direccion'=>$request->proveedor_direccion
        ]);


        if(!$proveedor){
            //prepara un array asociativo con un mensaje de error y un código de estado HTTP. llamado $data
            $data = [
                'message'=>'Error al crear el proveedor',
                'status'=>500,
            ];

            return response()->json($data,500);
        }

        // Si el registro se creó con éxito y $proveedor no es falso, prepara un array con los datos del proveedor.
        $data = [
            'proveedor' => $proveedor,
            'status'    => 201,
        ];

        // Devuelve una respuesta JSON con los datos del proveedor y el código de estado HTTP 201
        return response()->json($data,201);

    }


    /**
     * show de un controlador se utiliza para mostrar un recurso específico
     */
    public function show($id)
    {
        //buscamos el proveedor mediante su ID
        $proveedor = Proveedor::find($id);

        //validamos si el proveedor no existe
        if(!$proveedor){

            $data = [
                'message'=>'El usuario no se ha encontrado',
                'status'=>404
            ];

            return response()->json($data,404);
        }

        //si el proveedor si existe creamos un arreglo asociativo para enviar los datos
        $data = [
            'proveedor' =>$proveedor,
            'status'=>200
        ];

        return response()->json($data,200);
    }

    /**
     * se utiliza en controladores de recursos para proporcionar una forma de mostrar un formulario de edición
     * y se encarga de la operación “Actualizar”
     */
    public function edit(Proveedor $proveedor)
    {
        //Este metodo no es necesario crearlo ya que en una API podemos utilizar de una sola vez el metodo update

    }

    /**
     * Update the specified resource in storage.
     * Request $request contiene los datos enviados por el usuario.
     */
    public function update(Request $request,$id)
    {

        //verificamos si existe el proveedor a modificar
        $proveedor = Proveedor::find($id);

        //si no existe el proveedor entra al if
        if(!$proveedor){
            $data = [
                'message'=>'El proveedor no se encuentra',
                'status'=>404
            ];

            return response()->json($data,404);
        }

        //validamos los datos entrantes del proveedor
        $validator = Validator::make($request->all(),[
            'proveedor_nombre'=>'required|max:50',
            'proveedor_telefono'=>'required|digits:9',
            'proveedor_direccion'=>'required|max:255'
        ]);

        //si los campos no cumplen con los requerimiento entrara al if
        if($validator->fails()){
            $data = [
                'message'=>'todos los campos son requeridos',
                'status'=>400
            ];

            return response()->json($data,400);
        }

        //enviamos los datos modificados
        $proveedor->proveedor_nombre=$request->proveedor_nombre;
        $proveedor->proveedor_telefono=$request->proveedor_telefono;
        $proveedor->proveedor_direccion=$request->proveedor_direccion;

        //guardamos los cambios
        $proveedor->save();

        $data = [
                'message'=>'La información se ha actualizado con éxito.',
                'status'=>400
        ];

        return response()->json($data,400);
    }

    /**
     * se utiliza en controladores de recursos para eliminar un registro específico
     */
    public function destroy($id)
    {
        //buscamos el id del proveedor
        $proveedor = Proveedor::find($id);

        //validamos si el proveedor no existe ingresa al if
        if(!$proveedor){

            $data = [
                'message'=>'El proveedor no se encuantra',
                'status'=>404,
            ];

            return response()->json($data,404);
        }

        //si el proveedor existe lo eliminamos
        $proveedor->delete();

        $data = ['message'=>'Registro eliminado correctamente',
                 'status' => 200
                ];

        return response()->json($data,200);
    }

}
