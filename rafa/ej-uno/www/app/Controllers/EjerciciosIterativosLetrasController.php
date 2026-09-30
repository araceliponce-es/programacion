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
            $counter = array_count_values($chars);


            $result = [];

            foreach ($counter as $char => $ocurrences) {
                // $result .= "<br>" . $char . " occurs " . $ocurrences;
                //rESULT ES UN ARRAY ASOCIATIVO DE LETRA:COUNTER

                $result[$char] = $ocurrences;
            }
            //asort ordena de menor a mayor por los values
            arsort($result);


            $this->ejercicio(filter_var($trimmedLetras, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $result);
        } else {
            $this->ejercicio(filter_var($trimmedLetras, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }

    //cleans any string of spaces and symbols
    private function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
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
