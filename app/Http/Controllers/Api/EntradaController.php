<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostramos la lista de las entradas de cada producto
        $entrada_Producto = Entrada::all();

        //validamos si trae datos
        if($entrada_Producto -> isEmpty()){
            $data = [
                'message' => 'No se encontraron registros',
                'status' => 404
            ];

            return response()->json($data,404);
        }

        return response()->json($entrada_Producto,200);
    }

    /*
     * Show the form for creating a new resource.

    public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validamos los datos de entrada
        $validator = Validator::make($request->all(),[
            'cod_producto' => 'required|integer|exists:producto,cod_producto',
            'proveedor_id' => 'required|integer|exists:proveedor,proveedor_id',
            'cantidad'     => 'required|numeric'
        ]);

        //validamos que todos los campos contengan la información
        if($validator->fails()){
            $data = [
                'message' => 'Todos lo campos son requeridos',
                'error'   => $validator->errors(),
                'status'  => 400
            ];

            return response()->json($data,400);
        }

        //crea un nuevo modelo entrada con los valores proporcionados en el arreglo asociativo.
        $entrada = Entrada::create(
            [
                'cod_producto' => $request->cod_producto,
                'proveedor_id' => $request->proveedor_id,
                'cantidad'     => $request->cantidad,
                'fecha_ingreso'=> Carbon::now()
            ]
        );

        //Después de crear el registro, el código verifica si la operación fue exitosa o no.
        if(!$entrada){
            $data = [
                'message'   => 'Error al crear el registro',
                'status'    => 500
            ];

            return response()->json($data,500);
        }

        // El arreglo $data se crea para agrupar los datos relevantes que se enviarán como respuesta..
        $data = [
            'entrada' => $entrada,
            'status'  => 201
        ];

        return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrada $entrada)
    {
        //
    }


}
