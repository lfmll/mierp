<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod=Producto::all()->where('estado','=','habilitado');
        return view("producto.index",["producto"=>$prod]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=new Producto();
        return view("producto.create",["product"=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile=$request->hasFile('cover') && $request->cover->isValid();
        $product=new Producto($request->all());
        $product->nombre=$request->nombre;
        $product->descripcion=$request->descripcion;
        $product->codigo=$request->codigo;
        $product->stock=0;

        if($hasFile){
            $extension=$request->cover->extension();
            $product->extension=$extension;
        }
        $product->estado="habilitado";
        if($product->save()){
            if($hasFile){
                $request->cover->move('images',"$product->id.$extension");
            }
            return redirect("/producto");
        }else{
            return view("producto.create",["product"=>$product]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Producto::find($id);
        return view('producto.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Producto::find($id);
        return view("producto.edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Producto::find($id);
        $hasFile=$request->hasFile('cover')&& $request->cover->isValid();
        $product->nombre=$request->nombre;
        $product->descripcion=$request->descripcion;
        $product->codigo=$request->codigo;
        if($hasFile){
            $extension=$request->cover->extension();
            $product->extension=$extension;
        }
        $product->fill($request->all());
        if($product->save()){

            if($hasFile){
                $request->cover->move('images',"$product->id.$extension");
            }

            return redirect("/producto");
        }else{
            return view("producto.edit",["product"=>$product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Producto::find($id);
        $product->estado="deshabilitado";
        if ($product->save()) {
            return redirect("/producto");
        }
    }
}
