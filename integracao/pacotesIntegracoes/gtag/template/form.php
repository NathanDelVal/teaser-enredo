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
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($gtagConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                            <label class="form-check-label">Status</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-idTagManager" class="form-control" value="<?= $gtagConfiguracoes[$form]['idTagManager'] ?>" placeholder="idTagManager">
                            <label >Id TagManager</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-idAnalytics" class="form-control" value="<?= $gtagConfiguracoes[$form]['idAnalytics'] ?>" placeholder="idAnalytics">
                            <label >Id Analytics</label>
                        </div>

                    </div>

                <?php else: ?>

                    <h5 class="text-center"> Configurações do formulário <b style="color: #007cb2; text-transform: capitalize;"><?= $form ?></b></h5>

                    <div class="row">


                        <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($gtagConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                            <label class="form-check-label">Status</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-event" id="trackFB" class="form-control" value="<?php echo ($gtagConfiguracoes[$form]['event'] !== '' ? $gtagConfiguracoes[$form]['event'] : 'SendLeed');  ?>" placeholder="event">
                            <label id="eventGTAG">event</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-event_category" id="event_categoryGTAG" class="form-control" value="<?= $gtagConfiguracoes[$form]['event_category'] ?>" placeholder="event_category">
                            <label id="event_categoryGTAG">event_category</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-event_label" id="event_labelGTAG" class="form-control" value="<?= $gtagConfiguracoes[$form]['event_label'] ?>" placeholder="event_label">
                            <label id="event_labelGTAG">event_label</label>
                        </div>

                    </div>

                <?php endif ?>




            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>