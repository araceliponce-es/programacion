<!-- getbootstrap.com/docs/4.0/components/forms/

necesitan tenr attr name
 -->

 <form id="form" method="post" action="/process.php">




  <div class="form-group">
    <label for="exampleFormControlInput1" >Email </label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select name="select--number" class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
<!--   i tienes un <select multiple>, para que PHP reciba todos los valores seleccionados, el name debe terminar en [].
 -->  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select name="select--numbers[]"  multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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