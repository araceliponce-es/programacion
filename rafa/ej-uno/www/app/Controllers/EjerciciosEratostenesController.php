<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 

// https://www.geeksforgeeks.org/php/php-program-to-count-the-occurrence-of-each-characters/

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;


// https://es.wikipedia.org/wiki/Criba_de_Erat%C3%B3stenes
// crea un array o map desde el 2 hasta x numero
// el primer numero (2) es primo y todos los multiplos que haya en ese array ya no son primos(ya no cuentan)
//sgte que cuenta es 3 es primo y sus multiplos ya no
// el 4 no cuenta, el 5 cuenta, enntonces es primo y sus multiplos ahora no cuentan
// el 6 no cuenta, el 7 es primo y asi.....
class EjerciciosEratostenesController extends \Com\Daw2\Core\BaseController
{

    public function ejercicio(string $numero = '', string $errores = '', array $result = [])
    {
        $data = array(
            'titulo' => 'ejercicios eratostenes ',
            'breadcrumb' => ['Inicio', 'eratostenes'],
            'seccion' => '/inicio'
        );

        $data['errores'] = $errores;
        $data['numero'] = $numero;
        $data['result'] = $result;


        $this->view->showViews(array('templates/header.view.php', 'ejercicios-eratostenes.view.php', 'templates/footer.view.php'), $data);
    }


    public function doEjercicio(): void
    {

        // this-> se usa cuando es un metodo funtion de la calse, si es de php no necesita

        $trimmedInput = strtolower(trim($_POST['numero'] ?? '')); //trim va al inicio y envolviendo
        $errores = $this->checkEjercicio($trimmedInput);

        //primero checkea validez
        if ($errores == '') {

            $result = [];
            $tempArray = [];
            $numbersToRemove = [];
            for ($i = 2; $i <= $trimmedInput; $i++) {
                // into $result, push $i
                // array_push($result, $i);
                array_push($tempArray, $i);
            }

            // now, remove the multiplos of first untouched number
            //end(array) encuentra el ultimo value del array (si en el input puso 6, entonces va de 2 a ese numero)
            for ($i = 2; $i <= $trimmedInput; $i++) {

                // si ese ARRAY YA ESTA EN EL ARRAY no se le hace nada
                if (in_array($i, $numbersToRemove)) {
                    continue;
                }

                //por ejm, si i vale 5, revisa si 6 NO, revisa si 7 es divisible divisible entre 5
                for ($j = $i + 1; $j <= $trimmedInput; $j++) {
                    if ($j % $i == 0 && !in_array($j, $numbersToRemove)) {
                        //si es multiplo && no esta alli de antes. anadirlo a numberstoremove
                        array_push($numbersToRemove, $j);
                    }
                }
            }

            // remover comparando los diferentes
            $result = array_diff($tempArray, $numbersToRemove);
            // $result =  $numbersToRemove;
            // $result =  $tempArray; //0...9 


            $this->ejercicio(filter_var($trimmedInput, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $result);
        } else {
            $this->ejercicio(filter_var($trimmedInput, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }










    private function checkEjercicio(String $letras): string
    {

        $errores = '';
        if (!is_numeric($letras)) {
            $errores = 'debes ingresar numeros';
        }
        if ($letras <= 2) {
            $errores = 'debes ingresar numero mayor a 2';
        }

        return $errores;
    }

    private function clean(string $string): string
    {
        return trim($string);
    }
}
