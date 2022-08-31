    <h1 style="color: #007cb2; text-transform: capitalize;"> Dados <?= $integracao ?>: </h1>
    <br>

    <h6> Selecione os formulários que deseja integrar com a
        <span style="color: #007cb2; text-transform: capitalize;"><?= $integracao ?></span>
        e passe as Configurações!
    </h6>

    <nav>
        <div class="nav nav-tabs" id="nav-tab-<?= $integracao ?>-<?= $integracao ?>" role="tablist">
            <?php foreach(['geral'] as $i => $form): ?>
                <button class="nav-link <?php if($i == 0): ?>active<?php endif; ?>" id="nav-<?= $form ?>-tab-<?= $integracao ?>" data-bs-toggle="tab" data-bs-target="#nav-<?= $form ?>-<?= $integracao ?>" type="button" role="tab" aria-controls="nav-<?= $form ?>-<?= $integracao ?>" aria-selected="true">
                    <span style="text-transform: capitalize;">
                        <?php if($form == 'geral'){ echo 'Configurações Gerais'; }else{ echo 'Form ' . $form; }  ?>
                    </span>
                </button>
            <?php endforeach; ?>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent-<?= $integracao ?>" style="padding-left: 0rem;">
        <?php foreach(['geral'] as $i => $form): ?>
            <div class="tab-pane fade <?php if($i == 0): ?>show active<?php endif; ?>" id="nav-<?= $form ?>-<?= $integracao ?>" role="tabpanel" aria-labelledby="nav-<?= $form ?>-tab-<?= $integracao ?>">

                <?php if($form == 'geral'): ?>
                    <h5 class="text-center">Configurações <b style="color: #007cb2; text-transform: capitalize;">Gerais/Padrão</b></h5>
                    <h6 class="text-center">
                        Integração Ativa
                    </h6>
                    <br>

                    <div class="row">

                        <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($whatsappConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                            <label class="form-check-label">Status</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <select class="form-select form-select-sm" name="<?= $form ?>-formulario" id="<?= $form ?>-formulario" aria-label="Default select example">
                                <option value="" selected>Selecione ...</option>
                                <?php foreach($formConfiguracoes as $i => $forms): if($forms === 'geral'){ continue; } ?>
                                    <option <?php if($forms === $whatsappConfiguracoes[$form]['formulario']): echo 'selected'; endif; ?> value="<?= $forms ?>"><?= $forms ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="<?= $form ?>-formulario">Formulario WhatsApp</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <input type="number" name="<?= $form ?>-numero" class="form-control" value="<?= $whatsappConfiguracoes[$form]['numero'] ?>" placeholder="Numero">
                            <label >Numero</label>
                        </div>

                        <div class="col-12 form-floating">
                            <textarea name="<?= $form ?>-texto" style="height: 100px" class="form-control" placeholder="Texto"><?= $whatsappConfiguracoes[$form]['texto'] ?></textarea>
                            <label>&nbsp;&nbsp;Texto</label>
                        </div>

                    </div>

                <?php else: ?>
                    <h5 class="text-center"> Configurações do formulário <b style="color: #007cb2; text-transform: capitalize;"><?= $form ?></b></h5>



                    <div class="row">


                        <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($whatsappConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                            <label class="form-check-label">Status</label>
                        </div>


                </div>
                <?php endif ?>

            </div>
        <?php endforeach; ?>
    </div>






    <button type="submit" class="btn btn-primary">Salvar</button>