@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
    <div class="conteiner-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.store') }}" method="post" class="form-horitzontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Usuario</h4>
                            <p class="class card-category">ingresar datos</p>
                        </div>
                        <div class="class card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" placeholder="ingrese su nombre" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="apellido" placeholder="ingrese su apellido" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
                                <div class="col-sm-7">
                                    <input type="numeric" class="form-control" name="cedula" placeholder="ingrese su cedula" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="piso" class="col-sm-2 col-form-label">piso</label>
                                <div class="col-sm-7">
                                    <input type="numeric" class="form-control" name="piso" placeholder="ingrese su piso" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="apartamento" class="col-sm-2 col-form-label">apartamento</label>
                                <div class="col-sm-7">
                                    <input type="numeric" class="form-control" name="apartamento" placeholder="ingrese su apartamento" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" placeholder="ingrese su correo" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="contraseña" autofocus>
                                </div>
                            </div>
                        </div>
                                    <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <!--End footer-->
            </div>
        </div>
    </div>            

@endsection