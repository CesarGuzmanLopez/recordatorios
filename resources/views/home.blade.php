@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Escritorio</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row text-center center">
                            @hasrole("Administrador")
                            <div class="col">
                                <h1><a href="{{ route('AdminUser.index') }}">Usuario </a></h1>
                            </div>
                            <div class="col">
                                <h1><a href="{{ route('adminitems.index') }}">Items </a></h1>
                            </div>
                            <div class="col">
                                <h1><a href="{{ route('adminAvisos.index') }}">Administrar Avisos</a></h1>
                            </div>
                            @endhasrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
