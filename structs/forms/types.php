<!-- INPUT FONE - Type 01 -->


  <div class="form-group">
    <label for="tel">telefone</label>
    <input type="tel" class="form-control js-input-flag" id="tel" aria-describedby="tel" placeholder="+55 (21) 0 0000-0000">
  </div>


<!-- INPUT FONE - Type 02 -->


  <div class="form-group">
    <label for="tel">telefone</label>
    <input type="tel" class="form-control js-input-celular" id="tel" aria-describedby="tel">
  </div>

  
<!-- INPUT DATE -->

<div class="form-group">
    <label for="date">DATA</label>
    <input type="text" class="form-control js-input-date" id="date" aria-describedby="date" placeholder="00/00/0000">
</div>


<!-- INPUT CEP -->

<div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" class="form-control js-input-cep" id="cep" aria-describedby="cep" placeholder="00000-000">
</div>


<!-- INPUT CPF -->

<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control js-input-cpf" id="cpf" aria-describedby="cpf" placeholder="000.000.000-00">
</div>


<!-- INPUT CNPJ -->

<div class="form-group">
    <label for="cnpj">CNPJ</label>
    <input type="text" class="form-control js-input-cnpj" id="cnpj" aria-describedby="cnpj" placeholder="00.000.000/000-00">
</div>


<!-- INPUT RG-->

<div class="form-group">
    <label for="rg">RG</label>
    <input type="text" class="form-control js-input-rg" id="rg" aria-describedby="rg" placeholder="00.000.000-0">
</div>



<!-- CHECKBOX -->

<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Check">
  <label class="form-check-label" for="Check">
    Check me out
  </label>
</div>


<!-- RADIO -->
<br><br>
<fieldset class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Radios" id="Radios1" value="option1" checked>
        <label class="form-check-label" for="Radios1">
          First radio
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="Radios" id="Radios2" value="option2">
        <label class="form-check-label" for="Radios2">
          Second radio
        </label>
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="Radios" id="Radios3" value="option3" disabled>
        <label class="form-check-label" for="Radios3">
          Third disabled radio
        </label>
      </div>
    </div>
  </div>
</fieldset>


<!-- SELECT -->

<div class="form-group">
    <select class="custom-select" required>
      <option value="">Open this select menu</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Example invalid custom select feedback</div>
  </div>


<!-- FILE -->

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>