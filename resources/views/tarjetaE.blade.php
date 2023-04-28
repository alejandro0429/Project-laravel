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
    <form enctype="multipart/form-data" action="{{ route('tarjeta.update', $tarjeta->id) }}" method="POST" id="formulario-tarjeta" class="formulario-tarjeta" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grupo">
            <label for="inputNumero">Cuenta del deposito</label>
            <select name="banco" id="inputNumero" maxlength="24" autocomplete="off" value="{{$tarjeta->banco}}">
                <option>banco del tesoro,  14404-21...</option>
                <option>banco de venezuela, 00055-43...</option>
            </select>
            @error('inputNumero')
            <small>
                <strong>{{$message}}</strong>
            </small>
            @enderror
        </div>
        <br>
        <div class="grupo">
            <label for="inputNombre">referencia de la transacción</label>
            <input name="referencia"type="text" id="inputNombre" maxlength="20" autocomplete="off" value="{{$tarjeta->referencia}}">
            @error('inputNombre')
            <small>
                <strong>{{$message}}</strong>
            </small>
            @enderror
        </div>
        <div class="grupo">
            <label for="pdf">PDF de la transacción</label>
            <input name="pdf" type="file" id="inputBanco" maxlength="20" autocomplete="off" value="{{$tarjeta->pdf}}">
            @error('inputBanco')
            <small>
                <strong>{{$message}}</strong>
            </small>
            @enderror
        </div>
        <div class="flexbox">
            
            <div class="grupo expira">
                <label for="fecha" name="fecha">Fecha del pago</label>
                
                <div class="flexbox">
                    <input type="date" name="fecha" id="fecha" value="{{$tarjeta->fecha}}">
                </div>
            </div>
            <div>
                <input type="hidden" name="status" value="pago en revision">
            </div>
        </div>
        <button type="submit" class="btn-enviar">Actualizar</button>
    </form>

<!-- JavaScript Bundle with Popper -->
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

<script src="{{ asset('js/pagos.js') }}"></script>

<script>
    const tarjeta = document.querySelector('#tarjeta'),
      btnAbrirFormulario = document.querySelector('#btn-abrir-formulario'),
      formulario = document.querySelector('#formulario-tarjeta'),
      numeroTarjeta = document.querySelector('#tarjeta .numero'),
      
      logoMarca = document.querySelector('#logo-marca'),
      firma = document.querySelector('#tarjeta .firma p'),
      banco = document.querySelector('#tarjeta .link-banco'),
      mesExpiracion = document.querySelector('#tarjeta #expiracion .mes'),
      yearExpiracion = document.querySelector('#tarjeta #expiracion .year'),
      ccv = document.querySelector('#tarjeta .ccv');


      //* volteamos la tarjeta agg frente

      const mostrarFrente = () => {
        if(tarjeta.classList.contains('active')){
            tarjeta.classList.remove('active');
        }
      }


//* ROTACION DE LA TARJETA
tarjeta.addEventListener('click', () => {
    tarjeta.classList.toggle('active');
});

//* BOTON PARA ABRIR FORMULARIO
btnAbrirFormulario.addEventListener('click', () => {
    btnAbrirFormulario.classList.toggle('active');
    formulario.classList.toggle('active')
});

//* SELECT DEL MES.
for(let i = 1; i <=12; i++){
    let opcion = document.createElement('option');
    opcion.value = i;
    opcion.innerText = i;
    formulario.selectMes.appendChild(opcion);
}

//* SELECT DEL AÑO.
const yearActual = 1999
for(let i = yearActual; i <= yearActual + 28; i++){
    let opcion = document.createElement('option');
    opcion.value = i;
    opcion.innerText = i;
    formulario.selectYear.appendChild(opcion);
}

formulario.referencia.addEventListener('keyup', (e) => {
    let valorInput = e.target.value;

    formulario.referencia.value = valorInput
    //* Eliminar espacios blancos
    .replace(/\s/g, '')
    //* ELIMINAR LETRAS
    .replace(/\D/g, '')
    //* PONIENDO ESPACIO CADA 4 NUMEROS
    //.replace(/([0-9]{4})/g, '$1 ')
    //* Eliminar el ultimo espacio
    .trim();

    numeroTarjeta.textContent = valorInput;

});

</script>
</body>
@endsection
