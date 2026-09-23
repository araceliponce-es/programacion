<!-- getbootstrap.com/docs/4.0/components/forms/

necesitan tenr attr name
 -->

 <form id="form" method="post" action="/calcula-notas.php">




  <div class="form-group">
    <label for="nota" >nota (0 al 10) </label>
    <input name="nota" type="number" class="form-control" id="nota" placeholder="">
  </div>
  
  <button type="submit">enviar</button>
</form>

<script>
/* document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#form")
    form.addEventListener("submit", (event) => {
        event.preventDefault()
        const formData = new FormData(form)
        console.log(formData)
    })
}) */
</script>