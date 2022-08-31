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
                        As configurações gerais são aplicadas a todos os forms que estão abilitados porem não
                        possuem suas proprias configurações.
                    </h6>
                    <br>

                    <div class="row">

                        <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" <?php if ($emailConfiguracoes[$form]['status'] == true) : ?> checked <?php endif ?>>
                            <label class="form-check-label">Status</label>
                        </div>

                        <h4><b> SMTP Configurações: </b></h4>



                        <div class="mb-3 col-4 form-floating">
                            <input list="email-geral-host-list" type="text" name="<?= $form ?>-Host" class="form-control" id="floatingHost" value="<?= $emailConfiguracoes[$form]['Host'] ?>" placeholder="Host">
                            <label for="floatingHost">Host</label>
                        </div>

                        <datalist id="email-geral-host-list">
                            <option value="smtp.gmail.com">
                                smtp.gmail.com
                            </option>
                        </datalist>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-Username" class="form-control" id="floatingUsername" value="<?= $emailConfiguracoes[$form]['Username'] ?>" placeholder="Username">
                            <label for="floatingUsername">Username</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="password" name="<?= $form ?>-Password" class="form-control" id="floatingPassword" value="<?= $emailConfiguracoes[$form]['Password'] ?>" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="mb-3 col-3 form-floating">
                            <select class="form-select form-select-sm" name="<?= $form ?>-SMTPSecure" id="floatingSMTP" aria-label="Default select example">
                                <option <?php if($emailConfiguracoes[$form]['SMTPSecure'] == 'ssl'): echo 'selected'; endif; ?> value="ssl">SSL</option>
                                <option <?php if($emailConfiguracoes[$form]['SMTPSecure'] == 'tls'): echo 'selected'; endif; ?> value="tls">TLS</option>
                                <option <?php if($emailConfiguracoes[$form]['SMTPSecure'] == 'desativar'): echo 'selected'; endif; ?> value="desativar">Desativar</option>
                            </select>
                            <label for="floatingSMTP">SMTPSecure</label>
                        </div>

                        <div class="mb-3 col-2 form-floating">
                            <input type="number" name="<?= $form ?>-Port" class="form-control" id="floatingPort" value="<?= $emailConfiguracoes[$form]['Port'] ?>" placeholder="Default 587">
                            <label for="floatingPort">Port</label>
                        </div>

                        <div class="mb-3 col-3 form-floating">
                            <input type="text" name="<?= $form ?>-FromEmail" class="form-control" id="floatingFromEmail" value="<?= $emailConfiguracoes[$form]['FromEmail'] ?>" placeholder="From Email">
                            <label for="floatingFromEmail">From Email</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="text" name="<?= $form ?>-FromName" class="form-control" id="floatingFromName" value="<?= $emailConfiguracoes[$form]['FromName'] ?>" placeholder="From Name">
                            <label for="floatingFromName">From Name</label>
                        </div>

                        <br>

                        <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-debug" <?php if ($emailConfiguracoes[$form]['debug'] == true) : ?> checked <?php endif ?>>
                            <label class="form-check-label">Debug</label>
                        </div>

                    </div>

                    <br>

                <div class="row emails-<?= $form ?>-list">

                    <div class="title">
                        <h4><b>Enviar para Emails:</b></h4>

                        <div class="button">
                            <button type="button" class="btn" onclick="adicionarEmail('<?= $form ?>')">Adicionar novo campo</button>
                        </div>
                    </div>


                    <?php $i=1; foreach($emailConfiguracoes[$form]['sendTo'] as $key => $email): ?>

                    <div class="col-4" style="margin-top:10px;" index-value="<?= $i ?>">
                        <div class="form-floating input-group">

                            <input type="email" name="<?= $form ?>-sendTo-<?= $i ?>" value="<?= $email ?>" class="form-control">

                            <div class="input-group-text" style="background-color: #59414100; border-color: #0000;">
                                <button type="button" class="btn btn-outline-light" onclick="removerEmail($(this))"  style="margin-top: 0.6em; color: #0d6efd; font-size: 12px;">x</button>
                            </div>

                            <label>Email <?= $i ?>:</label>
                        </div>
                    </div>

                    <?php $i++; endforeach; ?>


                </div>




                <?php else: ?>

                    <h5 class="text-center"> Configurações do formulário <b style="color: #007cb2; text-transform: capitalize;"><?= $form ?></b></h5>

                    <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                        <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" <?php if ($emailConfiguracoes[$form]['status'] == true) : ?> checked <?php endif ?>>
                        <label class="form-check-label">Status</label>
                    </div>

                    <div class="row emails-<?= $form ?>-list">

                        <div class="title">
                            <h4><b>Enviar para Emails:</b></h4>

                            <div class="button">
                                <button type="button" class="btn" onclick="adicionarEmail('<?= $form ?>')">Adicionar novo campo</button>
                            </div>
                        </div>



                        <?php $i=1; foreach($emailConfiguracoes[$form]['sendTo'] as $key => $email): ?>

                            <div class="col-4" style="margin-top:10px;" index-value="<?= $i ?>">
                                <div class="form-floating input-group">

                                    <input type="email" name="<?= $form ?>-sendTo-<?= $i ?>" value="<?= $email ?>" class="form-control">

                                    <div class="input-group-text" style="background-color: #59414100; border-color: #0000;">
                                        <button type="button" class="btn btn-outline-light" onclick="removerEmail($(this))"  style="margin-top: 0.6em; color: #0d6efd; font-size: 12px;">x</button>
                                    </div>

                                    <label>Email <?= $i ?>:</label>
                                </div>
                            </div>

                            <?php $i++; endforeach; ?>




                    </div>




                <?php endif ?>




            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>

