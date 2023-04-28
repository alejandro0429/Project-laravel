@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Editar Usuario'])
@section('content')
<div class="content">
    <div class="conteiner-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horitzontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Usuario</h4>
                            <p class="class card-category">Editar datos</p>
                        </div>
                        <div class="class card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="apellido" value="{{ $user->apellido }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
                                <div class="col-sm-7">
                                    <input type="numeric" class="form-control" name="cedula" value="{{ $user->cedula }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="piso" class="col-sm-2 col-form-label">piso</label>
                                <div class="col-sm-7">
                                    <input type="numeric" class="form-control" name="piso" value="{{ $user->piso }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="apartamento" class="col-sm-2 col-form-label">apartamento</label>
                                <div class="col-sm-7">
                                    <input type="numeric" class="form-control" name="apartamento" value="{{ $user->apartamento }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña solo en caso de modificarla" autofocus>
                                </div>
                            </div>
                        </div>
                                    <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
              <!--End footer-->
            </div>
        </div>
    </div>            

@endsection