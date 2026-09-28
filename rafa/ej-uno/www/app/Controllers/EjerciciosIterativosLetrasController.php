<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 

// https://www.geeksforgeeks.org/php/php-program-to-count-the-occurrence-of-each-characters/

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosIterativosLetrasController extends \Com\Daw2\Core\BaseController
{
 
 public function ejercicio()
    {
        $data = array(
            'titulo' => 'ejercicios iterativos letras',
            'breadcrumb' => ['Inicio', 'ejercicios iterativos'],
            'seccion' => '/inicio'
        );

       
        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--letras.view.php', 'templates/footer.view.php'), $data);
    }


      public function doEjercicio(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $formLetras = trim($_POST['letras']); //trim va al inicio y envolviendo
        $check = $this->checkEjercicio($formLetras);

        //primero checkea validez
        if ($check === true) {
            $data['formLetras'] = $formLetras;

            $separadas = str_split($formLetras);
            $counter = array_count_values($separadas);


            $result = '';

            foreach($counter as $char => $ocurrences){
                $result .= "<br>" . $char . " occurs " . $ocurrences;
            }
            $data['separadas'] = $separadas;
            $data['result'] = $result;



            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--letras.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['formLetrasError'] = $check;
            //si no pasó el check, retorna el valor que haya en input ,pero sanitizado
            $data['formLetras'] = filter_var($formLetras, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--letras.view.php', 'templates/footer.view.php'), $data);
        }
    }


    private function checkEjercicio(String $letras):string|true{
        if($letras ===''){
            return 'debes ingresar letras';
        }


        
        return true;
    }
}
