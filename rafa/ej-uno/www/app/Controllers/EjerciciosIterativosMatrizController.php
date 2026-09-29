<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 


declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosIterativosMatrizController extends \Com\Daw2\Core\BaseController
{
 
 public function ejercicio()
    {
        $data = array(
            'titulo' => 'ejercicios matriz',
            'breadcrumb' => ['Inicio', 'ejercicios matriz'],
            'seccion' => '/inicio'
        );

       
        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--matriz.view.php', 'templates/footer.view.php'), $data);
    }


      //form-matriz. NO PUEDES USAR GUIONES EN NOMBRES DE VARIABLES
     public function doEjercicio(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $errores = $this->checkEjercicio($_POST);
        $numeros = $_POST['numeros'] ?? '';

        //primero checkea validez
        if ($errores === []) {
            $data['numeros'] = filter_var($numeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--matriz.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['errores'] = $errores;
            //si no pasó el check, retorna el valor que haya en input form-matriz sanitizado
            $data['numeros'] = filter_var($numeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--matriz.view.php', 'templates/footer.view.php'), $data);
        }
    }


    //o array_merge 
    private function checkEjercicio(array $data):array{

    $errores = [];
      $nums = [];

        //un array vacio es que no existe o no tiene items
        if(empty($data['numeros'])){
             $errores['numeros'] = 'debes ingresar numeros';
        } else{

            $matrizRows = explode('|',$data['numeros']);
            
            foreach ($matrizRows as $row) {

             $nums = explode(',',$row);

               foreach ($nums as $num) {

             

                if(!is_numeric($num)){
                    //convierte el value de data.numeros en un array
                    $errores['numeros'] = "el valor '$num' no es un numero";
                } 
            }
            }

        }

       


        return $errores;
    }
}
