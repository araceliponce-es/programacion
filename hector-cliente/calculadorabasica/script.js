const SYMBOLS = ['-', '+', '/', 'x', 'exp']

// let number;
let operation = '';
//si los dejas sin definir como empty string, concatena como : undefined575454...
let number1 = '';
let number2 = '';
let result;


//decimal separator del usuario
const decimalSeparator = new Intl.NumberFormat().format(1.1).charAt(1);



document.addEventListener('DOMContentLoaded', () => {


  console.log(parseFloat("1234,45"))
  console.log({ operation })
  //Cambia el valor del btndecimal al decimal separator (sigue siendo coma)
  document.getElementById('btnDecimal').value = (decimalSeparator);

  document.querySelectorAll('#calculadora input').forEach(input => {
    // input.addEventListener('click', () => {
    //   console.log(input.value)
    // })

    //ambos son lo mismo

    input.addEventListener('click', (e) => {
      // console.log('Click:', e.target.value);

      let clickedValue = e.target.value;
      if (clickedValue === 'C') {
        //darC() llama a refrescar() solamente
        darC()
        return;

      } else if (clickedValue === '=') {
        //debe verificar que number1 y number2 existen


        //luego hace una operacion
        esIgual()
        return;

      }
      if (SYMBOLS.includes(clickedValue)) {
        //establece la operacion
        operation = clickedValue;
        return;

      } else {
        // si operacion no tiene valor
        if (operation == '') {
          // concatena al number1
          number1 += clickedValue;
          console.log({ number1 })
          document.getElementById('valor_numero').value = number1

        } else {
          // concatena al number2
          number2 += clickedValue;
          console.log({ number2 })
          document.getElementById('valor_numero').value = number2

        }

      }





    });
  })

})



// Comprueba los valores de la variable global de resultados.En caso de que el valor de la variable sea 0 o no sea un decimal con 0, automáticamente toma el valor introducido.Si ninguna de estas condiciones se cumple, el nuevo número se concatena / suma al valor total de la variable.

function darNumero(numero) {

}


// Añade la coma decimal.Realiza la comprobación para que solo los números positivos y el 0 puedan ser decimales, descartando los números negativos decimales.Si el resultado actual es negativo y se intenta añadir decimales, se colocará automáticamente un 0.

function darComa() {

  if (number1 < 0) return;

  // number1

}


// Función de reinicio(tecla C).Borra todos los resultados almacenados y restablece las variables a 0.
function darC() {
  refrescar()

}

// Almacena los valores introducidos y la operación seleccionada para procesarlos al pulsar igual.Recibe como parámetro un número asignado a cada operación:
// 1: Suma(+) 2: Resta(-) 3: Multiplicación(×) 4: División(÷) 5: Potencia(xⁿ)
function operar(valor) {
  switch (valor) {
    case '+':
      console.log('caso suma')
      result = parseFloat(number1) + parseFloat(number2);
      break;
    case '-':
      console.log('caso resta')
      result = parseFloat(number1) - parseFloat(number2);
      break;
    case 'x':
      console.log('caso resta')
      result = parseFloat(number1) * parseFloat(number2);
      break;
    case '/':
      console.log('caso div')
      result = parseFloat(number1) / parseFloat(number2);
      break;
    case 'exp':
      console.log('caso exp')
      result = parseFloat(number1) ** parseFloat(number2);
      break;
    default:
      // Código que se ejecuta si ningún caso coincide
      console.log('operacion no aceptada')
  }
}


// Se ejecuta al pulsar el botón de igual(=).Procesa los números y la operación seleccionada mediante una estructura switch para ejecutar la operación matemática correspondiente y obtener el resultado final.
function esIgual() {
  operar(operation)
  document.getElementById('valor_numero').value = result
}

// Actualiza el valor visible en la caja de texto / pantalla de la calculadora en función de los botones o números pulsados para reflejar el estado actual.

function refrescar() {
  number1 = ''
  number2 = ''
  result = 0
  operation = ''
  document.getElementById('valor_numero').value = result
}





function getFormatNumber(num) {

  // if (num === "-") {
  if (symbols.find(num) !== null) {
    // si encuentra el valor del btn presionado en el array symbols

    //cambiar a si num string continene algun symbol
    return "";
  }
  if (num.length > 10) {
    num = num.substr(0, 10);
    alert("it tooo much!");
  }
  let aux = Number(num);
  if (aux === "Infinity") {
    value = "0";
    alert("Error");
  } else {
    var value = aux.toLocaleString("en");
  }
  return value;
}

function reverseNumberFormat(num) {
  return Number(num.replace(/,/g, ""));
}
