5.2. Propiedades calculadas

El nombre de una propiedad también puede obtenerse desde una expresión:

const campo = "categoria";

const producto = {
id: 101,
[campo]: "pantallas"
};

console.log(producto.categoria);

(pudo usar let campo = categoria, pero aunque cambie el valor de ese let, el valor del CONST PRODUCTO NO CAMBIARA DINAMICAMENTE, SI FUESE LET PRODUCTO IGUAL NO CAMBIA)

let campo = "perro";
let producto = {
id: 101,
[campo]: "pantallas"
};
console.log(producto);

campo = "gato";
console.log(producto);
