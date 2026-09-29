
<!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/geolocation -->
<geolocation>
  <button id="fallback">Use location</button>
</geolocation>
<p id="output"></p>
<script>
  const outputElem = document.querySelector("#output");

if (typeof HTMLGeolocationElement === "function") {
  const geo = document.querySelector("geolocation");
  geo.addEventListener("location", () => {
    if (geo.position) {
      outputElem.textContent += `(${geo.position.coords.latitude},${geo.position.coords.longitude}), `;
    } else if (geo.error) {
      outputElem.textContent += `${geo.error.message}, `;
    }
  });
} else {
  const fallback = document.querySelector("#fallback");
  fallback.addEventListener("click", () => {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        outputElem.textContent += `(${position.coords.latitude}, ${position.coords.longitude}), `;
      },
      (error) => {
        outputElem.textContent += `${error.message}, `;
      },
    );
  });
}
</script>




<!-- el formulario -->
 <form action="" method="POST">


 <div >
   <label for="name">Nombre:</label>
    <input
        type="text"
        name="name"
        id="name"
        value="<?= $name ?? '' ?>"
    >

 </div>

    <div>
      <label for="categoria">Categoría:</label>

    <select name="categoria" id="categoria">
        <option value="">-- Selecciona una categoría --</option>
        <option value="animales">Animales</option>
        <option value="frutas">Frutas</option>
        <option value="colores">Colores</option>
    </select>
    </div>

   
   

    <button type="submit">Enviar</button>





     <div class="answer">


       <?php if (isset($conocido)): ?>

    <?php if ($conocido): ?>

        <p>            Hola, <?= $name ?>        </p>

    <?php else: ?>

        <p>            Hola, desconocido        </p>

        <?php endif; ?>

    <?php endif; ?>

     </div>

</form>