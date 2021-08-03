<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class recordatorios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = Item::get();
        $usuarios = User::whereHas("roles", function ($q) {
            $q->where("name", "Usuario");
        })->get();
        $Avisos = Aviso::get();
        $Admin = [
            'Items' => $Items,
            'Usuarios' => $usuarios,
            'Avisos' => $Avisos
        ];
        return view("recordatorios.admin")->with($Admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_Usuario' => 'required',
            'Automovil' => 'required',
            'Tipo' => 'required',
            'Concurrencia' => 'required'
        ]);
        $nuevo = new Aviso();
        $nuevo->ID_Usuario = $request->Usuario;
        $nuevo->ID_item = $request->Automovil;
        $nuevo->Medio_de_Aviso = $request->Tipo;
        $fech = date('d/m/Y ', $request->time);
        switch ($request->Concurrencia) {
            case 0:
                $nuevo->Fecha_de_recordatorio =  $fech;
                $nuevo->Descripcion = "Concurrencia: Por kilometraje". $request->Kilo." \n";
                break;

            case 1:
                $nuevo->Fecha_de_recordatorio =  $fech;
                $nuevo->Descripcion = "Concurrencia: Cada 3 meses\n";
                break;

            case 3:
                $nuevo->Fecha_de_recordatorio =  $fech;
                $nuevo->Descripcion = "Concurrencia: Unico -" . $fech . "\n";
                $nuevo->Fecha_de_recordatorio = date('Y-m-d H:i:s');
            default:
                $nuevo->Fecha_de_recordatorio =  $fech;
                $nuevo->Descripcion = "Concurrencia: Unico -" . $fech . "\n";
        }
        $nuevo->Descripcion = "$request->Descripcion";
        $nuevo->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Avi = Aviso::find($id);
        $Avi->delete();
        return back();
    }
}
