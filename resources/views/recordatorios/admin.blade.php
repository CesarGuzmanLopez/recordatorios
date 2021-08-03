@extends('layouts.app')
@section('content')

    <div class="container bg-white rounded-lg">
        <div class="container p-2 m-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                            <option value="2">Correo</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <select name="Concurrencia" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="1">Por kilometraje</option>
                            <option value="2">Cada 3 meses</option>
                             <option value="4">Cada mes</option>
                            <option value="3">Unico</option>
                        </select>
                    </div>
                    <div>
                    </div>
                    <div class="form-group col">
                        <input name="Kilo" type="number" placeholder="kilometraje">
                    </div>
                    <div class="form-group col">
                        <textarea name="Descripcion" rows="1" cols="50" placeholder="Descripcion"></textarea>
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
                        <th scope="col">Tipo de recordatorio</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Enviar eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Avisos as $Aviso)
                        <tr>
                            <td>{{ $Aviso->User->name }} {{ $Aviso->User->lastname }}</td>
                            <td> <b> serie: {{ $Aviso->Item->Serie }}</b> {{ $Aviso->Item->placas }}</td>
                            <td>correo</td>
                            <td><textarea readonly>{{ $Aviso->Descripcion }}</textarea></td>
                            <td>
                                <form action="{{ route('adminAvisos.destroy', $Aviso->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />

                                    <button> eliminar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('adminAvisos.destroy', $Aviso->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />

                                    <button> enviar eliminar</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
