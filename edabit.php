<?php

function animals($chickens, $cows, $pigs)
{
  $legsPerAnimal = [2, 4, 4];
  $total = 0;





  $total += $chickens * $legsPerAnimal[0];
  $total += $cows * $legsPerAnimal[1];
  $total += $pigs * $legsPerAnimal[2];


  return $total;
};


$a = animals(1, 3, 5);
// echo $a;



// function addition($a, $b)
// {
//   return $a + $b;
// }
// function remainder($x, $y)
// {
//   return $x % $y;
// }
// // Create a function that finds the maximum range of a triangle's third edge, where the side lengths are all integers.
// function nextEdge($side1, $side2)
// {
//   if (!is_int($side1) || !is_int($side2)) {
//     return 0;
//   } else {
//     return ($side1 + $side2) - 1;
//   };
// }


function playlist_name($mood)
{
  if (mb_strlen(trim($mood)) <= 30 && mb_strlen(trim($mood)) > 0) {
    return "$mood Mix";
  } else {
    return "";
  };
};


// playlist_name("Focus");



function programmers($one, $two, $three)
{
  $arrayPagos = [$one, $two, $three];
  $max = $arrayPagos[0];
  $min = $arrayPagos[0];

  for ($i = 1; $i < count($arrayPagos); $i++) {
    if ($arrayPagos[$i - 0] < $arrayPagos[$i]) {
      $max = $arrayPagos[$i];
      $min = $arrayPagos[$i - 0];
    } else {
      $max = $arrayPagos[$i - 0];
      $min = $arrayPagos[$i];
    }
  }

  return $max - $min;
};


echo "un set es un conjunto de elemntos sin repeticiones......";



// HashSet, TreeSet, LinkedHashSet 

programmers(147, 33, 526);



echo 'aahdha--------------------';
$list = ['a', 'b', 'c'];

//si es un array simple, se imprimen los indices 0,1,2....
foreach ($list as $key => $value) {
  echo $key;
}
