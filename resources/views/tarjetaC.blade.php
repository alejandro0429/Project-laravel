@extends('layouts.main', ['activePage' => 'bancos', 'titlePage' => 'Bancos'])
@section('content')
<title>Formulario de Tarjeta de Crédito Dinámico</title>
<link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/pagos.css') }}">
</head>
<body>
<div class="contenedor">

    <!-- Tarjeta -->
    <section class="tarjeta" id="tarjeta">
        <div class="delantera">
            <div class="logo-marca" id="logo-marca">
                <!-- <img src="img/logos/visa.png" alt=""> -->
            </div>
            <img src="img/chip-tarjeta.png" class="chip" alt="">
            <div class="datos">
                <div class="grupo" id="numero">
                    <p class="label">Referencia de la transacción</p>
                    <p class="numero">#### #### #### ####</p>
                </div>
                <div class="flexbox">
                    <div class="grupo" id="nombre">
                        <p class="label">Cuenta</p>
                        <p class="nombre">....</p>
                    </div>

                    <div class="grupo" id="expiracion">
                        <p class="label">..</p>
                        <p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="trasera">
            <div class="barra-magnetica"></div>
            <div class="datos">
                <div class="grupo" id="firma">
                    <p class="label">Firma</p>
                    <div class="firma"><p></p></div>
                </div>
                <div class="grupo" id="ccv">
                    <p class="label"></p>
                    <p class="ccv"></p>
                </div>
            </div>
            <p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem, voluptates illo.</p>
            <a href="#" class="link-banco">www.tubanco.com</a>
        </div>
    </section>

        <!-- BOTON DEL FORMULARIO -->
        <div class="contenedor-btn">
            <button class="btn-abrir-formulario" id="btn-abrir-formulario">
                <i class="fas fa-plus"></i>
            </button>
        </div>

    <!-- FORMULARIO  -->
    <!-- NOTIFICACION  -->
    @if(session('status'))
    <div class="status">
        {{ session('status') }}
    </div>
    @endif
    <!-- INPUTS  -->
    <form method="POST" enctype="multipart/form-data" action="{{ route('tarjeta.store') }}" id="formulario-tarjeta" class="formulario-tarjeta" enctype="multipart/form-data">
        @csrf
        <div class="form_container">
        <div class="mb-3">

            <div class="form-group">
                {{ Form::label('usuario') }}
                {{ Form::select('user_id',$user, $tarjeta->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '' ]) }}
                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            {{--<label class="label" for="inputNumero">Cuenta del deposito</label>--}}
            <input name="banco" id="inputNumero" maxlength="24" type="hidden" autocomplete="off" value="ninguno">
        </div>
        <div class="mb-3">
             {{--<label class="label" for="inputNombre">referencia de la transacción</label>--}}
            <input class="form-control-lg" name="referencia"type="hidden" id="inputNombre" maxlength="20" autocomplete="off" value="ninguna">
        </div>
        <div class="mb-3">
            {{--<label class="label" for="pdf">PDF de la transacción</label>--}}
            <input class="form-control-lg" name="pdf" type="hidden" id="inputBanco" maxlength="20" autocomplete="off" value="ninguno">
            @error('inputBanco')
            <small>
                <strong>{{$message}}</strong>
            </small>
            @enderror
        </div>
        <div class="mb-3">
            
            <div class="mb-3">
                <label class="label" for="fecha" name="fecha">Fecha del pago</label>
                
                <div class="mb-3">
                    <input class="form-control-lg" type="date" name="fecha" id="fecha">
                </div>
            </div>
            <div>
                <label class="label" for="status" name="status">Status</label>
                <input class="form-control-lg" type="text" name="status" value="pendiente">
            </div>
        </div>
        <button type="submit" class="btn-enviar">Enviar</button>
    </div>
    </form>

<!-- JavaScript Bundle with Popper -->
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/edit.js')}}"></script>
</body>
</html>

@endsection