@extends('layouts.app')
@section('content')

    <div class="container bg-white rounded-pill">
        <div class="container p-2 m-2">
            <div class="text-center"><b>Añadir recordatorio</b></div>
            <form>
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
                        <select name="Usuario" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Automovil </option>
                            @foreach ($Items as $Item)
                                <option value="{{ $Item->id }}"> <b style="color: red;">{{ $Item->Motor }}</b>
                                    #placas {{ $Item->placas }} ({{ $Item->Descripcion }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col">
                        <select name="Usuario" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Tipo de recordatorio </option>
                            <option value="1">Whatsappp</option>
                            <option value="2">correo</option>
                            <option value="3">correo y whatsapp</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <select name="Usuario" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Reco </option>
                            <option value="1">por kilometraje</option>
                            <option value="2">cada 3 meses</option>
                            <option value="3">unico</option>
                        </select>
                    </div>


                    <div class="form-group col">

                        <input type="checkbox"/>
                    </div>
                    que parece esto enserio es demasiado dificil




                    <div class="form-group col">
                        <label for="recipient-name" class="col-form-label"></label>
                    </div>
                </div>
            </form>
        </div>
    </div>


    </div>


@endsection
