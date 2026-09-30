<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 


declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosIterativosMatrizController extends \Com\Daw2\Core\BaseController
{
 
// numeros y errores son parametros opcionales
 public function ejercicio(string $numeros = '', array $errores = [])
    {
        $data = array(
            'titulo' => 'ejercicios matriz',
            'breadcrumb' => ['Inicio', 'ejercicios matriz'],
            'seccion' => '/inicio'
        );

        //no olvidar asignar aqui
        $data['errores'] = $errores;
        $data['numeros'] = $numeros;
       
        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos--matriz.view.php', 'templates/footer.view.php'), $data);
    }


      //form-matriz. NO PUEDES USAR GUIONES EN NOMBRES DE VARIABLES
     public function doEjercicio(): void
    {
        
        $errores = $this->checkEjercicio($_POST);
       

        //primero checkea validez
        if ($errores === []) {
             $aux = explode('|', $_POST['numeros']);

            $numeros = [];
            foreach ($aux as $ns) {
                $numeros = array_merge($numeros,  explode(',', $ns));
            }

            // sort() ordena de menor a mayor, maryor a menor es reverse sort
            rsort($numeros);
            
                    // Volvemos a mostrar la vista???
            $this->ejercicio(implode(',', $numeros));

            
        } else {
            //no olvides el $this->
            $this->ejercicio(filter_var($_POST['numeros'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),$errores);
        }
    }

 
    private function checkEjercicio(array $data):array{

      $errores = [];
        if (empty($data['numeros'])) {
            $errores['numeros'] = 'Campo obligatorio';
        } else if(count(explode('|', $data['numeros']))===1){

           //si tuviese solo 1 elemento (no encontro ningun |)           
            $errores['numeros'] = 'pusiste 1 sola fila';
            

        } else {
            $aux = explode('|', trim($data['numeros']));             
            
            //Primero comprobamos que todas las filas tengan el mismo número de elementos
            foreach ($aux as $array) {
                if (!isset($numColumnas)) {
                    $numColumnas = count(explode(',', $array));
                } else if ($numColumnas !== count(explode(',', $array))) {
                    $errores['numeros'] = 'Las filas deben tener el mismo número de columnas.';
                }
            }
            $numeros = [];
            //Aplanamos y comprobamos que son números
            foreach ($aux as $ns) {
                $numeros = array_merge($numeros,  explode(',', $ns));
            }
            foreach ($numeros as $numero) {
                if (!is_numeric($numero)) {
                    $errores['numeros'] = "El valor '$numero' no es un número";
                }
                
            }
        }
        return $errores;
    }
}
