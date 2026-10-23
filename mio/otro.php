<?php
$sueldos = [100, 200, 123];
function programmers($one, $two, $three)
{


  $sueldos = [$one, $two, $three];
  // digamos, asuminos que el primer item es el menor y el mayor valor
  $sueldoMin = $sueldos[0];
  $sueldoMax = $sueldos[0];

  // se ejecuta 2 veces: i vale 1 y luego 2
  for ($i = 1; $i < count($sueldos); $i++) {
    if ($sueldos[$i] > $sueldoMax) {
      $sueldoMax = $sueldos[$i];
    } else if ($sueldos[$i] < $sueldoMin) {
      $sueldoMin = $sueldos[$i];
    };
  }

  return $sueldoMax - $sueldoMin;
}



//si tengo el radio calcula el area de 2 cuadrados
// el area de cuadrado dentro es = (radio * 2) al cuadrado
//el area de cuadrado dentro de circulo es = 2*(radio al cuadrado)



function squareAreasDifference($r)
{
  $areaUno = ($r * 2) * ($r * 2);
  $areaDos = 2 * ($r * $r);
  return $areaUno - $areaDos;
}



//usar hawownproperty, en caso de valores que son numeros (sino los interpreata como un booleano (JAVASCRIPT))


// cuenta cuantos 1s (unos) hay entre todos los digitos (no el ultimo)
// si  numero de unos es impar, el ultimos digito debe ser 1
// si el numero de unos es par, el ultimo digito debe ser 0 
//cantidad de characteres debe ser 8 en total (o sea 7 y el ultimo)