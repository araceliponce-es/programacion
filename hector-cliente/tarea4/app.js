// Cálculo de costes de licencias en Linux Mint
function calcularCosteTotal() {
  let numeroEquipos = 8;
  let costeLicencia = 15;

  // ERROR LÓGICO INTENCIONADO: Se realiza una suma en lugar de una multiplicación
  let subtotal = numeroEquipos * costeLicencia;

  let iva = subtotal * 0.21;
  let total = subtotal + iva;

  console.log("El coste total es: " + total);
}

// Ejecutamos la función
calcularCosteTotal();