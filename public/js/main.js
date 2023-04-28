const tarjeta = document.querySelector('#tarjeta'),
      btnAbrirFormulario = document.querySelector('#btn-abrir-formulario'),
      formulario = document.querySelector('#formulario-tarjeta'),
      numeroTarjeta = document.querySelector('#tarjeta .numero'),
      nombreTarjeta = document.querySelector('#tarjeta .nombre'),
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

//* Input numero de tarjeta

formulario.inputNumero.addEventListener('keyup', (e) => {
    let valorInput = e.target.value;

    formulario.inputNumero.value = valorInput.replace(/[0-9]/g, '')
    //* Eliminar espacios blancos
    .replace(/\s/g, '')
    //* ELIMINAR LETRAS
    .replace(/\D/g, '')
    //* PONIENDO ESPACIO CADA 4 NUMEROS
    //.replace(/([0-9]{4})/g, '$1 ')
    //* Eliminar el ultimo espacio
    .trim();

    numeroTarjeta.textContent = valorInput;

    if(valorInput == ''){
        numeroTarjeta.textContent = '#### #### #### ####';

        logoMarca.innerHTML = '';
    }

    if(valorInput[0] == 4){
        logoMarca.innerHTML = '';
        const imagen = document.createElement('img');
        imagen.src = 'img/logos/visa.png';
        logoMarca.appendChild(imagen);
    }

    //* Voltear tarjeta frente
    mostrarFrente();
}); 

//* input nombre de la tarjeta
    formulario.inputNombre.addEventListener('keyup', (e)=> {
        let valorInput = e.target.value;

        formulario.inputNombre.value = valorInput.replace(/\D/g, '');
        nombreTarjeta.textContent = valorInput;
        firma.textContent = valorInput;

        if(valorInput == ''){
            nombreTarjeta.textContent = '...';
        }

        firma.textContent = valorInput;
    });

    //* input nombre de la tarjeta
    formulario.inputBanco.addEventListener('keyup', (e)=> {
        let valorInput = e.target.value;

        formulario.inputBanco.value = valorInput.replace(/[0-9]/g, '');
        banco.textContent = valorInput;

    });

    //* select mes
    formulario.selectMes.addEventListener('change', (e) => {
        mesExpiracion.textContent = e.target.value;
        mostrarFrente();
    });

    //* select Año
    formulario.selectYear.addEventListener('change', (e) => {
         yearExpiracion.textContent = e.target.value.slice(2);
          mostrarFrente();
    });

     //* CCV DE LA TARJETA
    formulario.inputCCV.addEventListener('keyup', () => {
        if(!tarjeta.classList.contains('active')){
            tarjeta.classList.toggle('active');
        }

        formulario.inputCCV.value = formulario.inputCCV.value
         //* Eliminar espacios blancos
        .replace(/\s/g, '')
        //* ELIMINAR LETRAS
        .replace(/\D/g, '');

        ccv.textContent = formulario.inputCCV.value;
     });