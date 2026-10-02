<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 

// https://www.geeksforgeeks.org/php/php-program-to-count-the-occurrence-of-each-characters/

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;


// Crea un script que reciba unha cadena de texto e muestre por pantalla un listado con las letras y su uso ordenadas de más usadas a menos. El algoritmo no distingue mayúsculas de minúsculas por lo que una c será igual que una 'C'. No es necesario que aparezcan las letras no usadas en el texto. Para limpiar el texto puedes ayudarte de los contenidos expuestos en la subsección "Expresiones regulares" del aula virtual. Ejemplo: "Casa" mostraría. "a: 2, c: 1, s: 1".
class EjerciciosIterativosLetrasController extends \Com\Daw2\Core\BaseController
{

    public function ejercicio(string $letras = '', string $errores = '', array $result = [])
    {
        $data = array(
            'titulo' => 'ejercicios iterativos letras',
            'breadcrumb' => ['Inicio', 'ejercicios iterativos'],
            'seccion' => '/inicio'
        );

        $data['errores'] = $errores;
        $data['letras'] = $letras;
        $data['result'] = $result;


        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--letras.view.php', 'templates/footer.view.php'), $data);
    }


    public function doEjercicio(): void
    {

        // this-> se usa cuando es un metodo funtion de la calse, si es de php no necesita

        $trimmedLetras = strtolower(trim($_POST['letras'] ?? '')); //trim va al inicio y envolviendo
        $errores = $this->checkEjercicio($trimmedLetras);

        //primero checkea validez
        if ($errores == '') {
            $trimmedLetras = $this->clean($trimmedLetras);
            //cuantos chars tiene el textarea 
            $chars = preg_split('//u', $trimmedLetras, -1, PREG_SPLIT_NO_EMPTY);


            $result = array_count_values($chars);


            //asort ordena de menor a mayor por los Values
            arsort($result);


            $this->ejercicio(filter_var($trimmedLetras, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $result);
        } else {
            $this->ejercicio(filter_var($trimmedLetras, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }





    //ejercicio palabras. Crea un script que reciba una cadena de texto y muestre por pantalla una lista de las palabras existentes en ella ordenadas por número de apariciones.------------------------------------------------------

    public function ejercicioPalabras(string $palabras = '', string $errores = '', array $result = [])
    {
        $data = array(
            'titulo' => 'cuenta palabras',
            'breadcrumb' => ['Inicio', 'cuenta palabras'],
            'seccion' => '/inicio'
        );

        $data['errores'] = $errores;
        $data['palabras'] = $palabras;
        $data['result'] = $result;


        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--palabras.view.php', 'templates/footer.view.php'), $data);
    }


    public function doEjercicioPalabras(): void
    {

        // this-> se usa cuando es un metodo funtion de la calse, si es de php no necesita

        $trimmedUserInput = strtolower(trim($_POST['palabras'] ?? '')); //trim va al inicio y envolviendo
        $errores = $this->checkEjercicio($trimmedUserInput);

        //primero checkea validez
        if ($errores == '') {
            $trimmedUserInput = $this->clean($trimmedUserInput);

            // en explode es primero el delimitador y luego el string
            $exploded = explode(' ', $trimmedUserInput);


            $result = $exploded;

            //eneste ejercicio key es el numero de apariciones y el value es la palabra.
            //ordenar por key
            krsort($result);


            $this->ejercicioPalabras(filter_var($trimmedUserInput, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $result);
        } else {
            $this->ejercicioPalabras(filter_var($trimmedUserInput, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }




    //fin de ejercicio palabras------------------------------------------------------


    //cleans any string of spaces and symbols
    private function clean($string)
    {
        return preg_replace('/[^A-Za-z]/', '', $string);  // Removes everything that is not a-z o A-Z
    }


    private function checkEjercicio(String $letras): string
    {

        $errores = '';
        if ($letras === '') {
            $errores = 'debes ingresar letras';
        }

        return $errores;
    }
}
