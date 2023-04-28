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
