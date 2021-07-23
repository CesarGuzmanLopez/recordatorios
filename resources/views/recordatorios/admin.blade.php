@extends('layouts.app')
@section('content')

    <div class="container bg-white rounded-lg">
        <div class="container p-2 m-2">
            <div class="text-center"><b>Añadir recordatorio</b></div>
            <form method="POST" action="{{ route('adminAvisos.index') }}">
                @csrf
                <div class="row">
                    <div class="form-group col">

                        <select name="Usuario" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Selecciona Usuario</option>
                            @foreach ($Usuarios as $User)
                                <option value="{{ $User->id }}">{{ $User->name }} {{ $User->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <select name="Automovil" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="" selected>Automovil </option>
                            @foreach ($Items as $Item)
                                <option value="{{ $Item->id }}"> <b style="color: red;">{{ $Item->Motor }}</b>
                                    #placas {{ $Item->placas }} ({{ $Item->Descripcion }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col">
                        <select name="Tipo" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="" selected>Tipo de recordatorio </option>
                            <option value="1">Whatsappp</option>
                            <option value="2">Correo</option>
                            <option value="3">Correo y Whatsapp</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <select name="Concurrencia" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value=""  selected>Concurrencia </option>
                            <option value="1">Por kilometraje</option>
                            <option value="2">Cada 3 meses</option>
                            <option value="3">Unico</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <input type="number" placeholder="kilometraje">
                    </div>
                    <div class="form-group col">
                        <button type="submit" class="button">Agregar recordatorio</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container-md p-5">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Automovil</th>
                        <th scope="col">Tipo de recordatoriop</th>
                        <th scope="col">Concurrencia</th>
                        <th scope="col">Kilometraje</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Avisos as $Aviso)
                        <tr>
                            <td>Usuario</td>
                            <td>Automovil</td>
                            <td>Tipo de recordatoriop</td>
                            <td>Concurrencia</td>
                            <td>Kilometraje</td>
                            <td>Eliminar</td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
