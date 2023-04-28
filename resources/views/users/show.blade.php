@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles de usuarios'])
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Usuarios</div>
                            <p class="card-category">vista detallada del usuario... {{ $user->name }}</p>
                        </div>
                        <!--body-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="author">
                                                    <a href="#">
                                                        <img src="{{ asset('/img/default-avatar.png')}}" alt="image" class="avatar">
                                                        <h5 class="title mt-3">{{ $user->name }}</h5>
                                                    </a>
                                                    <p class="description">
                                                        
                                                       <h3>Nombre</h3> {{ $user->name }}<br>
                                                       <h3>apellido</h3> {{ $user->apellido }}<br>
                                                       <h3>cedula</h3> {{ $user->cedula }}<br>
                                                       <h3>piso</h3> {{ $user->piso }}<br>
                                                       <h3>apartamento</h3> {{ $user->apartamento }}<br>
                                                       <h3>Correo</h3> {{ $user->email }}<br>
                                                       <h3>fecha de creacion</h3> {{ $user->created_at }}<br>
                                                    </p>
                                                </div>
                                            </p>
                                            <div class="card-description">
                                                
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('users.index') }}" class="btn btn-sm btn.success mr-3"> Volver </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection