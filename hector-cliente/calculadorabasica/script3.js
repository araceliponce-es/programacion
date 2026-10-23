"use strict"

// Evita variables globales accidentales: Si asignas un valor a una variable que no ha sido declarada con let, const o var, el código lanzará un error en lugar de crear una variable global por accidente. Y más beneficios

//  Los módulos de ECMAScript (ES Modules) y el interior de las clases ya se encuentran en modo estricto de forma automática, sin necesidad de escribir esa directiva.

console.log('hi')

dia = 14
console.log(dia)

console.log(indexOf())


const message = "Welcome to freeCodeCamp!";
console.log("Here are some examples of the slice() method:");


let endPunctuation = message.slice(-1);
console.log(`The ending punctuation mark is a "${endPunctuation}"`)


console.log("Workshop complete! You now know how to use includes() and slice().")


const upperCaseInput = cleanedInput.toUpperCase(); // "I LOVE TO CODE!"



const lowerCaseInput = cleanedInput.toLowerCase();
console.log("Result of using the toLowerCase() method:");
console.log(lowerCaseInput);