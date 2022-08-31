<div class="title">
    <h1>Nome Dos Formularios:</h1>

    <div class="button">
        <button type="button" class="btn novo-formulario" >Adicionar novo campo</button>
    </div>

</div>


<div class="row form-name form-list">



    <?php
        foreach ($formConfiguracoes as $i => $form):
                //if($i == 1){ $i+=1; continue; }
                if($form == 'geral'){ continue; }
            ?>



    <div class="mb-3 col-3 form-floating input-group " data-form="" index-value="<?= $i ?>">


        <input type="text" name="formulario-<?= $i ?>" id="floatingForm" value="<?= $form ?>" class="form-control" placeholder="Nome Formulario">

        <div class="input-group-text" style="background-color: #59414100; border-color: #0000;">
            <button type="button" class="btn btn-outline-light" onclick="removerFormulario($(this))" style="margin-top: 0.6em; color: #0d6efd; font-size: 12px;">x</button>
        </div>

        <label for="floatingForm">Nome Formulario <?= $i ?>:</label>
    </div>

    <?php endforeach; ?>

</div>

<button type="submit" class="btn btn-primary">Salvar</button>