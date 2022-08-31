<h1 style="color: #007cb2; text-transform: capitalize;"> Dados <?= $integracao ?>: </h1><br>
<h6> Selecione os formulários que deseja integrar com a <span style="color: #007cb2; text-transform: capitalize;"><?= $integracao ?></span> e passe as Configurações! </h6>

<nav>
    <div class="nav nav-tabs" id="nav-tab-<?= $integracao ?>-<?= $integracao ?>" role="tablist">
        <?php foreach($formConfiguracoes as $i => $form): ?>
            <button class="nav-link <?php if($i == 0): ?>active<?php endif; ?>" id="nav-<?= $form ?>-tab-<?= $integracao ?>" data-bs-toggle="tab" data-bs-target="#nav-<?= $form ?>-<?= $integracao ?>" type="button" role="tab" aria-controls="nav-<?= $form ?>-<?= $integracao ?>" aria-selected="true">
                    <span style="text-transform: capitalize;">
                        <?php if($form == 'geral'){ echo 'Configurações Gerais'; }else{ echo 'Form ' . $form; }  ?>
                    </span>
            </button>
        <?php endforeach; ?>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent-<?= $integracao ?>" style="padding-left: 0rem;">
    <?php foreach($formConfiguracoes as $i => $form): ?>
        <div class="tab-pane fade <?php if($i == 0): ?>show active<?php endif; ?>" id="nav-<?= $form ?>-<?= $integracao ?>" role="tabpanel" aria-labelledby="nav-<?= $form ?>-tab-<?= $integracao ?>">

            <?php if($form == 'geral'): ?>
                <h5 class="text-center">Configurações <b style="color: #007cb2; text-transform: capitalize;">Gerais/Padrão</b></h5>
                <h6 class="text-center">
                    Integração Ativa
                </h6>
                <br>

                <div class="row">

                    <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                        <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($anaproConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                        <label class="form-check-label">Status</label>
                    </div>

                </div>

            <?php else: ?>

                <h5 class="text-center"> Configurações do formulário <b style="color: #007cb2; text-transform: capitalize;"><?= $form ?></b></h5>

                <div class="row">


                    <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                        <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" <?php if ($anaproConfiguracoes[$form]['status'] == true) : ?> checked <?php endif ?>>
                        <label class="form-check-label">Status</label>
                    </div>

                    <div class="mb-3 col-4 form-floating">
                        <input type="text" name="<?= $form ?>-CampanhaKey" id="floatingCampanhaKey" class="form-control" value="<?= $anaproConfiguracoes[$form]['CampanhaKey'] ?>" placeholder="CampanhaKey">
                        <label for="floatingCampanhaKey">Campanha Key</label>
                    </div>

                    <div class="mb-3 col-4 form-floating">
                        <input type="text" name="<?= $form ?>-ProdutoKey" class="form-control" id="floatingProductKey" value="<?= $anaproConfiguracoes[$form]['ProdutoKey'] ?>" placeholder="ProdutoKey">
                        <label for="floatingProductKey">Produto Key</label>
                    </div>

                    <div class="mb-3 col-4 form-floating">
                        <input type="text" name="<?= $form ?>-Key" class="form-control" id="floatingKey" value="<?= $anaproConfiguracoes[$form]['Key'] ?>" placeholder="Key">
                        <label for="floatingKey">Key</label>
                    </div>

                    <div class="mb-3 col-4 form-floating">
                        <input type="text" name="<?= $form ?>-KeyIntegradora" class="form-control" id="floatingKeyIntegradora" value="<?= $anaproConfiguracoes[$form]['KeyIntegradora'] ?>" placeholder="KeyIntegradora">
                        <label for="floatingKeyIntegradora">Key Integradora</label>
                    </div>

                    <div class="mb-3 col-4 form-floating">
                        <input type="text" name="<?= $form ?>-KeyAgencia" class="form-control" id="floatingKeyAgencia" value="<?= $anaproConfiguracoes[$form]['KeyAgencia'] ?>" placeholder="KeyAgencia">
                        <label for="floatingKeyAgencia">Key Agência</label>
                    </div>

                    <div class="mb-3 col-4 form-floating">
                        <input type="text" name="<?= $form ?>-CanalKey" class="form-control" id="floatingCanalKey" value="<?= $anaproConfiguracoes[$form]['CanalKey'] ?>" placeholder="CanalKey">
                        <label for="floatingCanalKey">Canal Key</label>
                    </div>



                </div>

            <?php endif ?>




        </div>
    <?php endforeach; ?>
</div>
<button type="submit" class="btn btn-primary">Salvar</button>



