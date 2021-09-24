@extends('layouts.app')
@section('content')
    <div class="container bg-white">
        <h1 class="text-center"><b>Usuarios</b></h1>
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
                    <form action="{{ route('AdminUser.store') }}" method="POST">
                        <div class="modal-header">
                            @csrf
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="name" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" name="lastname" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">email:</label>
                                <input type="text" class="form-control" name="email" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">telefono:</label>
                                <input type="text" class="form-control" name="telefono" id="recipient-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">password:</label>
                                <input type="password" class="form-control" name="password" id="recipient-name" value="">
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">editar</th>
                            <th scope="col">eliminar</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($Usuarios as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->lastname }}
                                </td>
                                <td>
                                    {{ $user->telefono }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <button class=" btn-info"
                                        @click=" editarelem( {{ $user->id }},'{{ $user->name }} ' ,
                                                                                                    '{{ $user->lastname }}',
                                                                                                    '{{ $user->telefono }}',
                                                                                                    '{{ $user->email }}')">
                                        editar
                                    </button>
                                </td>
                                <td>
                                    <button class=" btn-danger"
                                        @click="eliminarelem ( {{ $user->id }}, ' {{ $user->name }}' , ' {{ $user->lastname }}')">eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>

            <b-modal ref="elimuser" title="Eliminar" hide-footer>
                <form :action="'{{ route('AdminUser.index') }}/'+ elim.id_eliminar" method="post">
                    ¿Desea eliminar <b> @{{ elim . Nombre }} @{{ elim . Apeliido }}</b>?
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <div class="w-80 m-2 p-2">
                        <button class="btn-danger" type="submit">Eliminar</button>
                        <button class="btn-warning" type="button" @click="eliminarcancel">cancel</button>
                    </div>
                </form>
            </b-modal>


            <b-modal ref="editaruser" title="modificar" hide-footer>
                <form :action="'{{ route('AdminUser.index') }}/'+ edit.id_editar" method="post">
                    <input type="hidden" name="_method" value="put" />
                    @csrf

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" v-model="edit.Nombre" name="name" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido:</label>
                        <input type="text" class="form-control" v-model="edit.Apellido" name="lastname" id="recipient-name"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">email:</label>
                        <input type="email" class="form-control" v-model="edit.correo" name="email" id="recipient-name"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">telefono:</label>
                        <input type="text" class="form-control" v-model="edit.Telefono" name="telefono" id="recipient-name"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">cambiar contraseña:</label>
                        <input type="checkbox" class="form-control" name="editarpass" v-model="edit.change_password">
                    </div>
                    <div class="form-group" v-if="edit.change_password">
                        <label for="recipient-name" class="col-form-label">password:</label>
                        <input type="password" class="form-control" v-model="edit.password" name="password"
                            id="recipient-name" value="">
                    </div>
                    <button class="btn-info" type="submit">editar</button>
                    <button class="btn-warning" type="button" @click="editarCancel">cancel</button>
                </form>
            </b-modal>
        </div>
        <br />
    </div>
@endsection
