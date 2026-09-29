<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosOtrosController extends \Com\Daw2\Core\BaseController
{

    public function ejercicio()
    {
        $data = array(
            'titulo' => 'ejercicios otros',
            'breadcrumb' => ['Inicio', 'ejercicios otros'],
            'seccion' => '/inicio'
        );

       
        $this->view->showViews(array('templates/header.view.php', 'ejercicios-otros.view.php', 'templates/footer.view.php'), $data);
    }


    public function doEjercicio(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $name = $_POST['name'];
        $categoria = $_POST['categoria'];

        //mantiene el valor seleecionado despues de enviar el form. son inputs controlados
        $data['name'] = $_POST['name'];
        $data['categoria'] = $_POST['categoria'];
        //fin

        $check = $this->checkEjercicio($categoria,$name);
        $data['conocido'] = $this->esNombreConocido($name);

        // Cannot use temporary expression in write context (olvidaste el $ antes de data)
        $data['check'] = $check;

        //primero checkea validez
        if ($check === true) {




            $this->view->showViews(array('templates/header.view.php', 'ejercicios-otros.view.php', 'templates/footer.view.php'), $data);
        } else {
            
            $this->view->showViews(array('templates/header.view.php', 'ejercicios-otros.view.php', 'templates/footer.view.php'), $data);
        }
    }



    private function checkEjercicio(String $categoria, String $name):string|true{

    $res = '';

     $categoriasDisponibles = [
        'animales',
        'frutas',
        'colores'
    ];

        if($categoria ===''){
            $res .= 'debes seleccionar una categoria';
        }

        // El tercer parámetro true hace que PHP compare también el tipo.
        if (!in_array($categoria, $categoriasDisponibles,true)) {
          $res .= 'la categoria seleccionada no es una cat. disponible';
        }

        if(trim($name) ===''){
            $res .= 'debes escribir un nombre';
        }
        
        //si res, que hasta ahora concatenaba errores tiene contenido, retorna eso
       if ($res !== '') {
            return $res;
        }

        //si no retorna true o sin errores
        return true;
    }

private function esNombreConocido(string $name): bool
{
    $nombresConocidos = [
        'Juan',
        'Pedro',
        'María',
        'Ana'
    ];

    return in_array($name, $nombresConocidos, true);
}

  




    
}
