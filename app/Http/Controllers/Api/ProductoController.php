<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Entrada;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostramos la lista de productos
        $producto = Producto::all();

        //validamos si trae datos
        if($producto->isEmpty()){
            $data = [
                'message' => 'No se encuantran registros para mostrar',
                'status'  => 404
            ];
            return response()->json($data,404);
        }

        return response()->json($producto,200);
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

    //con esto validamas que el idcategoria y idunidadmedida exista en su tabla correspondiente(categoria,unidadesmedida)
    //y el ID que se esta recibiendo exista en los campos(cod_categoria y cod_unidadmedida)
    //|exists:categoria,cod_categoria
    //|exists:unidadesmedida,cod_unidadmedida
    public function store(Request $request)
    {
        //validamos que se reciba datos
        $validator = Validator::make($request->all(),[
            'nombre'            =>'required|max:250',
            'descripcion'       =>'required|max:250',
            'stock'             =>'nullable|numeric',
            'cod_categoria'     =>'required|integer|exists:categoria,cod_categoria',
            'cod_unidadmedida'  =>'required|integer|exists:unidadesmedida,cod_unidadmedida'
        ]);

        //validamos que todos los campos contengan la información
        if($validator->fails()){
            $data = [
                'message' => 'todos los campos son requeridos',
                'error'=> $validator->errors(),
                'status' =>400
            ];

            return response()->json($data,400);
        }

        //crea un nuevo modelo Producto con los valores proporcionados en el arreglo asociativo.
        $producto = Producto::create([
            'nombre'            =>$request->nombre,
            'descripcion'       =>$request->descripcion,
            'stock'             =>$request->stock,
            'cod_categoria'     =>$request->cod_categoria,
            'cod_unidadmedida'  =>$request->cod_unidadmedida
        ]);

        //Después de crear el registro, el código verifica si la operación fue exitosa o no.
        if(!$producto){

            $data = [
                'message' => 'Error al crear el registro',
                'status'  => 500
            ];

            return response()->json($data,500);
        }

        // El arreglo $data se crea para agrupar los datos relevantes que se enviarán como respuesta..
        $data = [
            'producto' => $producto,
            'status'   => 201
        ];

        return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }

    //filtramos los productos por categoría
    /*public function productosPorCategoria($cod_categoria){

        $productosPorCategoria = Producto::with('categoria')->where('cod_categoria', $cod_categoria)->get();

        return response()->json($productosPorCategoria,200);
    }*/

    //filtrar los productos
    public function filtrarPorProveedor(){

        $producto = Producto::where('cod_categoria', 3)->first();

        return response()->json($producto,200);
    }




}
