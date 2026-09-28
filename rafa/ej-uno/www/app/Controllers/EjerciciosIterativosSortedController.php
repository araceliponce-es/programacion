<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 


declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosIterativosSortedController extends \Com\Daw2\Core\BaseController
{
 
 public function ejercicio()
    {
        $data = array(
            'titulo' => 'ejercicios iterativos sorted',
            'breadcrumb' => ['Inicio', 'ejercicios iterativos'],
            'seccion' => '/inicio'
        );

       
        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--sorted.view.php', 'templates/footer.view.php'), $data);
    }


      //form-matriz. NO PUEDES USAR GUIONES EN NOMBRES DE VARIABLES
     public function doEjercicio(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $formMatrizNumeros = $_POST['form-matriz'];
        $check = $this->checkEjercicio2($formMatrizNumeros);

        //primero checkea validez
        if ($check === true) {
            $data['formMatrizError'] = $check;


            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['formMatrizError'] = $check;
            //si no pasó el check, retorna el valor que haya en input form-matriz sanitizado
            $data['formMatrizNumeros'] = filter_var($formMatrizNumeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos.view.php', 'templates/footer.view.php'), $data);
        }
    }


    private function checkEjercicio2(String $numeros):string|true{
        if($numeros ===''){
            return 'debes ingresar numeros';
        }

        $matrizNumeros = explode('|',$numeros);

        if($matrizNumeros ===''){
            return 'debes usar |';
        }


        //recorre la matriz y luego cada numero, y si alguno es no numero retorna false
        foreach ($matrizNumeros as $arrayNumeros) {
            


            $nums = explode(',',$arrayNumeros);

          

            foreach ($nums as $num) {         


             if(!is_numeric($num)){
                return 'Debe ingresar numeros separados por comas';
                
            }
        }
        }

        return true;
    }
}
