@extends('layouts.app')
@section('content')
    <div class="container container-sm container-fluid bg-white">
        <h1 class="text-center"><b>Unidades/Equipos</b></h1>
        <button type="button" class="btn btn-primary m-2 p-2" data-toggle="modal" data-target="#user-id-2">Agregar</button>
        <button type="submit" class="btn btn-secundary border-bottom">
            Guardar csv
        </button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="user-id-2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('adminitems.store') }}" method="POST">
                        <div class="modal-header">
                            @csrf
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Serie:</label>
                                <input type="text" class="form-control" name="serie" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Motor:</label>
                                <input type="text" class="form-control" name="motor" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">placas:</label>
                                <input type="text" class="form-control" name="placas" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" name="descripcion" id="recipient-name" value="">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kilometros:</label>
                                <input type="number" class="form-control" name="Kilometros" id="recipient-name" value="">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ultimo mantenimiento </label>
                                <input type="date" class="form-control" name="ultimo_mantenimiento" id="recipient-name"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">poliza </label>
                                <input type="text" class="form-control" name="poliza" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">departamento </label>
                                <input type="text" class="form-control" name="departamento" id="recipient-name" value="">
                            </div>
                        </div>





                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">
                                agregar
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Serie</th>
                            <th scope="col">Motor</th>
                            <th scope="col">placas</th>
                            <th scope="col">poliza</th>
                            <th scope="col">departamento</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Kilometros</th>
                            <th scope="col">Ultimo mantenimiento</th>
                            <th scope="col">editar</th>
                            <th scope="col">eliminar</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($Items as $item)
                            <tr>
                                <td>
                                    {{ $item->Serie }}
                                </td>
                                <td>
                                    {{ $item->Motor }}
                                </td>
                                <td>
                                    {{ $item->placas }}
                                </td>
                                <td>
                                    {{ $item->poliza }}
                                </td>
                                <td>
                                    {{ $item->departamento }}
                                </td>
                                <td>
                                    {{ $item->Descripcion }}
                                </td>
                                <td>
                                    {{ $item->kilometros }}
                                </td>
                                <td>
                                    {{ $item->Ultimo_mantenimiento ? date('d/m/Y ', strtotime($item->Ultimo_mantenimiento)) : '' }}
                                </td>
                                <td>
                                    <button class=" btn-warning" @click="editaritem (
                                                            '{{ $item->id }}',
                                                            ' {{ $item->Serie }}',
                                                            ' {{ $item->Motor }}',
                                                            ' {{ $item->placas }}',
                                                            ' {{ $item->Descripcion }}',
                                                             '{{ $item->Kilometros }}',
                                                            '{{ $item->Ultimo_mantenimiento ? date('Y-m-d', strtotime($item->Ultimo_mantenimiento)) : '' }}',
                                                            '{{ $item->poliza }}',
                                                            '{{ $item->departamento }}'

                                                         )">editar</button>
                                </td>

                                <td>
                                    <button class=" btn-danger"
                                        @click="eliminaritem ( {{ $item->id }}, ' {{ $item->Serie }}' , ' {{ $item->Motor }}')">eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>

            <b-modal ref="elimitem" title="Eliminar" hide-footer>
                <form :action="'{{ route('adminitems.index') }}/'+elim_item.id" method="post">
                    <p> motor: @{{ elim_item . Motor }} </p>
                    <p> serie: @{{ elim_item . Serie }} </p>
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <div class="w-80 m-2 p-2">
                        <button class="btn-danger" type="submit">Eliminar</button>
                        <button class="btn-warning" type="button" @click="eliminaritemOcultar">cancel</button>
                    </div>
                </form>
            </b-modal>


            <b-modal ref="edititem" title="modificar" hide-footer>
                <form :action="'{{ route('adminitems.index') }}/'+edit_item.id" method="post">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Serie:</label>
                        <input type="text" class="form-control" name="serie" id="recipient-name" v-model="edit_item.Serie">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Motor:</label>
                        <input type="text" class="form-control" name="motor" id="recipient-name" v-model="edit_item.Motor">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">placas:</label>
                        <input type="text" class="form-control" name="placas" id="recipient-name"
                            v-model="edit_item.placas">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion" id="recipient-name"
                            v-model="edit_item.Descripcion">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kilometros:</label>
                        <input type="number" class="form-control" name="Kilometros" id="recipient-name"
                            v-model="edit_item.Kilometros">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">poliza:</label>
                        <input type="text" class="form-control" name="poliza" id="recipient-name"
                            v-model="edit_item.poliza">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Ultimo mantenimiento </label>
                        <input type="date" class="form-control" name="ultimo_mantenimiento" id="recipient-name"
                            v-model="edit_item.Ultimo_mantenimiento">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Departamento</label>
                        <input type="text" class="form-control" name="departamento" id="recipient-name"
                            v-model="edit_item.departamento">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            @click="editaritemOcultar">Close</button>
                        <button type="submit" class="btn btn-primary">
                            editar
                        </button>
                    </div>

                </form>
            </b-modal>
        </div>
        <br />
    </div>
@endsection
