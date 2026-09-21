<!-- https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4947
 -->

<div class="">
  el cuadrado del numero <?= $numero; ?> es <?= $cuadrado; ?> 
</div>


<div class="aaaa">
   El precio hora es <?= $tarifa_hora; ?> €, se han trabajado <?= $horas_trabajadas; ?>  horas por lo que se pagarán <?= number_format($tarifa_hora * $horas_trabajadas,2,',','.'); ?>  €
</div>


<div class="reactngulo">
  el area es <?= $rectangulo_w * $rectangulo_h; ?> . y el perimetro es <?= 2 * ($rectangulo_w + $rectangulo_h); ?>
</div>


<div class="cinco">
  <p>la persona se alojo <?= $noches_temp_alta; ?> en temp alta, por lo que debe pagar <?= $tarifa_temp_alta; ?> euros por noche, en total son: <?= $tarifa_temp_alta*$noches_temp_alta; ?> </p>
  <p>la persona se alojo <?= $noches_temp_baja; ?> en temp baja, por lo que debe pagar <?= $tarifa_temp_baja; ?> euros por noche, en total son: <?= $tarifa_temp_baja*$noches_temp_baja; ?> </p>
</div>


<div class="trescifrsas">
  <p>
    El número <?= $numero_tres_cifras;?> está formado por <?= $centenas;?> centenas, <?= $decenas; ?> decenas y <?= $unidades;?> unidades
  </p>
</div>
<div class="cadena">
  <p>la cadea de texto <?= $cadena; ?> esta formada por caracteres:  <?= mb_strlen($cadena,'utf-8'); ?>   y palabras:   <?= str_word_count($cadena); ?>. </p>
</div>




<div class="tabla">

<table class="table table-striped table-valign-middle col-12 col-md-6">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="assets/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
</div>