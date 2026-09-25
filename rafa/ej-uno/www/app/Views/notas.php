<!-- no es parte de la actividad, solo de la explicacion: ........... -->
<hr>
<?php







/**
 * Convert a multi-dimensional array into a single-dimensional array.
 * @author Sean Cannon, LitmusBox.com | seanc@litmusbox.com https://gist.github.com/SeanCannon/6585889
 * @param  array $array The multi-dimensional array.
 * @return array
 */
function array_flatten($array) { 
  if (!is_array($array)) { 
    return false; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } else { 
      $result = array_merge($result, array($key => $value));
    } 
  } 
  return $result; 
}




$cars = array('volvo',15, 'bmw',['toyota','esto']);
$cars = ['volvo',15, 'bmw',['toyota','esto']];
$a = [
  'algo'=>9,
  'otro'=>'fjdskfhdkhf'
];


// echo $cars[3]+10; //no puedes sumar array + algo



// unset($noombrearry['keyy'])

//array_diff elementos que hay en uno pero no en otro


//VER metodos de ordenacion de array: sort, rsort (solo para arrays planos)

 foreach ($a as $key => $value) { 
    // echo "$key";
    $value = 'valor cambiado';
  } ;
var_dump($a);

//usa & antes del $ del valor que quieres que mantenga cambios de valor en el original
//ó usa $nombrearray[$key] = dgfdjgjdg
$b = [
  'algo'=>9,
  'otro'=>'fjdskfhdkhf'
];
foreach ($b as $key=> &$value) {
    // $value = 'valor cambiado';
    $b[$key] ='tambien es valor cambiado';
}
var_dump($b);

?>