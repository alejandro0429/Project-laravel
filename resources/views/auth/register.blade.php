@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('condominio')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="card card-login card-hidden mb-3">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title"><strong>{{ __('Crear Usuario') }}</strong></h4>
                    </div>
                    <div class="card-body ">
                        <p class="card-description text-center">{{ __('') }}</p>
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Nombre...') }}"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                        
                        <!--APELLIDO-->
                        <div class="bmd-form-group{{ $errors->has('apellido') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">account_circle</i>
                                    </span>
                                </div>
                                <input type="text" name="apellido" class="form-control" placeholder="{{ __('Apellido...') }}"
                                    value="{{ old('apellido') }}" required autocomplete="apellido">
                            </div>
                            @if ($errors->has('apellido'))
                            <div id="apellido-error" class="error text-danger pl-3" for="apellido" style="display: block;">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </div>
                            @endif
                        </div>
                        <!--CEDULA-->
                        <div class="bmd-form-group{{ $errors->has('cedula') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">fingerprint</i>
                                    </span>
                                </div>
                                <input type="numeric" name="cedula" class="form-control" placeholder="{{ __('Cedula...') }}"
                                    value="{{ old('cedula') }}" required autocomplete="cedula">
                            </div>
                            @if ($errors->has('cedula'))
                            <div id="cedula-error" class="error text-danger pl-3" for="cedula" style="display: block;">
                                <strong>{{ $errors->first('cedula') }}</strong>
                            </div>
                            @endif

                     <!--PISO-->
                        <div class="bmd-form-group{{ $errors->has('piso') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">maps_home_work</i>
                                    </span>
                                </div>
                                <input type="numeric" name="piso" class="form-control" placeholder="{{ __('piso...') }}"
                                    value="{{ old('piso') }}" required autocomplete="piso">
                            </div>
                            @if ($errors->has('piso'))
                            <div id="piso-error" class="error text-danger pl-3" for="piso" style="display: block;">
                                <strong>{{ $errors->first('piso') }}</strong>
                            </div>
                            @endif

                            <!--selector de APARTAMENTO -->
                            <div class="bmd-form-group{{ $errors->has('apartamento') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                    </div>
                                <label for="apartamento"></label>
                                <select class="form-control selectpicker" data-style="btn btn-link" name="apartamento">
                                    <option selected disabled value="">Apartamento...</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                                </div>
                        </div>

                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="{{ __('Correo...') }}"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @if ($errors->has('email'))
                            <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control"
                                    placeholder="{{ __('Contraseña...') }}" required autocomplete="new-password">
                            </div>
                            @if ($errors->has('password'))
                            <div id="password-error" class="error text-danger pl-3" for="password"
                                style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div
                            class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="{{ __('Repetir Contraseña...') }}" required ="new-password">
                            </div>
                            @if ($errors->has('password_confirmation'))
                            <div id="password_confirmation-error" class="error text-danger pl-3"
                                for="password_confirmation" style="display: block;">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                            @endif
                        </div>
                        {{-- <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="policy" name="policy"
                                    {{ old('policy', 1) ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                            </label>
                        </div> --}}
                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit"
                            class="btn btn-primary btn-link btn-lg">{{ __('Crear') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection