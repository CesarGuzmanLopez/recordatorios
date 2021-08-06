@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="">
                <div class="card" style="background: rgba(250, 240, 240,.2 )">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row text-center center">
                            @hasrole("Administrador")
                            <div class="col">
                                <h3><a href="{{ route('AdminUser.index') }}">Usuario </a></h3>

                                <div class="">
                                    <a href="{{ route('AdminUser.index') }}">  <img src="{{ env('APP_URL') }}/Imagen1.jpg" alt=""></a>

                                </div>
                            </div>
                            <div class="col">
                                <h3><a href="{{ route('adminitems.index') }}">Unidades/Equipos </a></h3>
                                <div class="">
                                    <a href="{{ route('adminitems.index') }}"> <img src="{{ env('APP_URL') }}/Imagen2.jpg" alt=""></a>

                                </div>
                            </div>
                            <div class="col">
                                <h3><a href="{{ route('adminAvisos.index') }}">Administrar Avisos</a></h3>
                                <div class="">
                                    <a href="{{ route('adminAvisos.index') }}"> <img src="{{ env('APP_URL') }}/Imagen3.png" alt=""></a>

                                </div>
                            </div>
                            @endhasrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
