<?php


declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1()
    {
        $data = array(
            'titulo' => 'ejercicios strings',
            'breadcrumb' => ['Inicio', 'ejercicios strings'],
            'seccion' => '/inicio'
        );



        $this->view->showViews(array('templates/header.view.php', 'ejercicios1-string.view.php', 'templates/footer.view.php'), $data);
    }
}
