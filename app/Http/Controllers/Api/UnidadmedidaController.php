<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unidadmedida;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class UnidadmedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostramos la lista de unidades de medida
        $unidades_medida = Unidadmedida::all();

        if($unidades_medida->isEmpty()){

            $data = [
                'message'=>'No se encontrarón registros',
                'status'=>404
            ];

            return response()->json($data,404);
        }

        return response()->json($unidades_medida,200);
    }

    /*
     Show the form for creating a new resource.

    public function create()
    {

    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validamos que los datos exitan antes de enviarlos a la BD
        $validator = Validator::make($request->all(),[
            'unidad_medida' => 'required|max:100'
        ]);

        if($validator->fails()){
            $data = [
                'message'   =>'Los campos son requeridos',
                'error'     =>$validator->errors(),
                'status'    =>400
            ];

            return response()->json($data,400);
        }

        //crea un nuevo modelo Unidadmedida con los valores proporcionados en el arreglo asociativo.
        $unidades_medida = Unidadmedida::create([
            'unidad_medida' => $request->unidad_medida
        ]);

        //Después de crear el registro, el código verifica si la operación fue exitosa o no.
        if(!$unidades_medida){
            $data = [
                'message'=>'error al crear el registro',
                'status'=>500,
            ];

            return response()->json($data,500);
        }

        // Si el registro se creó con éxito y $unidades_medida no es falso, prepara un array con los datos de las unidades_medida.
        //El arreglo $data se crea para agrupar los datos relevantes que se enviarán como respuesta.
        $data = [
            'unidad_medida' => $unidades_medida,
            'status'    => 201,
        ];

         // Devuelve una respuesta JSON con los datos del proveedor y el código de estado HTTP 201
         return response()->json($data,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Unidadmedida $unidadmedida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unidadmedida $unidadmedida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unidadmedida $unidadmedida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidadmedida $unidadmedida)
    {
        //
    }
}
