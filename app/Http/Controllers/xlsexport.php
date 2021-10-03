<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class xlsexport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $fileName = 'tasks.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );


        $columns="";
        $callback=null;
        switch ($id) {
            case 'Usuarios':
                    $columns = array('Nombre', 'Apellido', 'Telefono', 'Correo');

                    $callback = function () use ($columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);
                        $usuarios = User::whereHas("roles", function ($q) {
                            $q->where("name", "Usuario");
                        })->get();
                        $row =  array();
                        foreach ($usuarios as $user) {
                            $row['Nombre']      = $user->name;
                            $row['Apellido']    = $user->lastname;
                            $row['Telefono']    = $user->telefono;
                            $row['Correo']      = $user->email;
                            fputcsv($file, $row);
                        }

                        fclose($file);
                    };

                break ;
            case "Items":
                    $columns = array('Serie','Motor','placas','Descripcion','kilometros','poliza','departamento','Ultimo_mantenimiento' );

                    $callback = function () use ($columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);
                        $items = Item::all();
                        $row =  array();
                        foreach ($items as $item) {
                            $row['Serie']      = $item->Serie;
                            $row['Motor']      = $item->Motor;
                            $row['placas']      = $item->placas;
                            $row['Descripcion']      = $item->Descripcion;
                            $row['kilometros']      = $item->kilometros;
                            $row['poliza']      = $item->poliza;
                            $row['departamento']      = $item->departamento;
                            $row['Ultimo_mantenimiento']      = $item->Ultimo_mantenimiento;

                            fputcsv($file, $row);
                        }

                        fclose($file);
                    };

                    break ;
            case "Recordatorios":
                $columns = array("Nombre_usuario","Serie","Placas","Poliza","Descripcion","Fecha_de_recoradtorio" );

                $callback = function () use ($columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
                    $Avisos = Aviso::get();
                    $row =  array();

                    foreach ($Avisos as $Aviso) {
                        echo $Aviso;
                        $row["Nombre_usuario"]= $Aviso->User->name ." ". $Aviso->User->lastname;
                        $row["Serie"]= $Aviso->Item->Serie??"";
                        $row["Placas"]= $Aviso->Item->placas??"";
                        $row["Poliza"]= $Aviso->Item->poliza??"";
                        $row['Descripcion']= $Aviso->$Aviso->Descripcion??"";

                        fputcsv($file, $row);
                    }
                     fclose($file);
                };


                break ;
            default:
                return redirect()->back();

        }
        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return back();
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
        return back();
    }
}
