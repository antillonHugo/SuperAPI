<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostramos la lista de las categorias
        $categoria = Categoria::all();

        if($categoria->isEmpty()){
            $data = [
                'message' => 'No se encuantran registros para mostrar',
                'status' => 404
            ];

            return response()->json($data,404);
        }

        return response()->json($categoria,200);
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
        //validamos los datos
        $validator = Validator::make($request->all(),[
            'nombre_categoria'=>'required|max:50|string'
        ]);

        if($validator->fails()){
            $data = [
                'message'=> 'Los campos son requeridos',
                'error'=> $validator->errors(),
                'status'=> 400
            ];

            return response()->json($data,400);
        }

        //crea un nuevo modelo Categoria con los valores proporcionados en el arreglo asociativo.
        $categoria = Categoria::create([
            'nombre_categoria' => $request->nombre_categoria
        ]);


        if(!$categoria){
            $data = [
                'message' =>'erro al crear el registro',
                'status'  => 500
            ];

            return response()->json($data,500);
        }

        // Si el registro se creó con éxito y $categoria no es falso, prepara un array con los datos de las categoria.
        //El arreglo $data se crea para agrupar los datos relevantes que se enviarán como respuesta.
        $data = [
            'categoria' => $categoria,
            'status'    =>201
        ];

        //retornamos los datos
        return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
