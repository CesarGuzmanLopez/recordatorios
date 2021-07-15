<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class adminitems extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = Item::get();
        return view("items.Adminitems")->with("Items", $Items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'motor' => 'required|unique:items|max:255'
        ]);
        //  $request->ultimo_mantenimiento;
        $item = Item::create([
            'Serie' => $request->serie,
            'Motor' => $request->motor,
            'placas' => $request->placas,
            'Descripcion' => $request->descripcion,
            'Kilometros' => $request->Kilometros,
            'Ultimo_mantenimiento' =>  $request->ultimo_mantenimiento
        ]);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $item = Item::find($id);

        $item->Serie = $request->serie;
        $item->Motor = $request->motor;
        $item->placas = $request->placas;
        $item->Descripcion = $request->descripcion;
        $item->Kilometros = $request->Kilometros;
        $item->Ultimo_mantenimiento =  $request->ultimo_mantenimiento;

        $item->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();
        // echo $usuarios;

        return back();
    }
}
