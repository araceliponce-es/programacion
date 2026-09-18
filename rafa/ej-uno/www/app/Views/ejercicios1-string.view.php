hola


<?php
$cars = array('volvo',15, 'bmw','toyota');

// ['esto',2],
echo "<hr/>";
echo "el titulo es $titulo";

echo "<hr/>";
echo "el nombre es $nombre";
echo "<hr/>";
echo "el nombre2 es $nombre2";
echo "<hr/>";
echo "el nombrefinal es";
printf('%s____%s', $s, $final); //esto solo funciona si lo escribo aqui, printf no puede usar echo.

echo "<hr/>";



echo count($cars);

// no menor o igual----- menor.
for ($i = 0; $i < count($cars); $i++) {
    echo "the number is:  $i ----- $cars[$i]";

    if ($i == 2) {
        break;
    }
    echo "i llego a ser 2";
};

$frutas = array('una' => 'tomate','dos' => 'pera');
echo "<br/> for each...........";
foreach ($frutas as $key => $value) {
    echo "$key: $value <br>";
}



    //los arrays asociativos, son los que usan=> (son como un map).......... lista['posicion'] ='algo

    //arrays en php son pilas, como el juego de niños




    // $resultado = sprintf("Hola %s %s", $nombre, $apellido);



    // php no permite sobrecargar funciones!!!!!



    // strpos  (si no existe devuelve false, si existe devuelve el indice)
    // == compara valores y === compara tambien el tipo de variable


    //0 es false, otros es true
    //si es un array, usar: $array===[] (es array y vacio)
    //if(empty($a)) //a esta declarada?





?>





<?php

$algo = $algo_existente ?? "aaaaaaaaaaaaaaa";
echo "$algo";

echo $otra_cosa ?? "no existe otra cosa";

echo "<hr>";
echo mb_strlen("carmiña");


$animal = str_ireplace("Pato", "p", "g");
 echo $animal;
?>

