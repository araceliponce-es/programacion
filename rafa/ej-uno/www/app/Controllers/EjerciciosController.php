<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1strings()
    {
        $data = array(
            'titulo' => 'ejercicios strings',
            'breadcrumb' => ['Inicio','ejercicios strings'],
            'seccion' => '/inicio'
        );
        //crear 3 variables
        $s = 'araceli';
        $final = 'user';
        $comillasDobles = "";
        $comillasSimples = '';

        // Con llaves {} si hay letras o números pegados
        $data['nombre'] = "$comillasDobles {$s}_user $comillasDobles";
         $data['nombre2'] = $comillasSimples . "user_" . $s . $comillasSimples;



         $data['final'] = $final;
        $data['s'] = $s;



        $this->view->showViews(array('templates/header.view.php', 'ejercicios1-string.view.php', 'templates/footer.view.php'), $data);
    }
}
