<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Agencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa=Empresa::all();
        return view("empresa.index",["empresa"=>$empresa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa=new Empresa();
        return view("empresa.create",["empresa"=>$empresa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $empresa=new Empresa($request->all());
            $empresa->nombre=$request->nombre;            
            $empresa->rubro=$request->rubro;
            $empresa->correo=$request->correo;
            if($hasFile){
                $extension=$request->cover->extension();
                $empresa->extension=$extension;
            }
            if($empresa->save()){
                if($hasFile){
                    $request->cover->move('images',"$product->id.$extension");
                }
            }

            $idagencia=$request->get('idagencia');
            $nombre_agencia=$request->get('nombre_agencia');
            $direccion=$request->get('direccion');
            $telefono=$request->get('telefono');
            $cont=0;
            while ($cont<count($idagencia)) {
                $agencia=new Agencia();
                $agencia->nombre=$nombre_agencia[$cont];
                $agencia->direccion=$direccion[$cont];
                $agencia->telefono=$telefono[$cont];
                $agencia->empresa_id=$empresa->id;
                $agencia->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch(\Exception $e){
            BD::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
