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

                        <div class="title">
                            <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                                <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($junixConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                                <label class="form-check-label">Status</label>
                            </div>
                            <div class="button">
                                <button type="button" class="btn" onclick="startJunix()" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ver Produtos</button>
                            </div>
                        </div>


                        <!-- https://api-gafisa-qa.imobflow.com.br -->
                        <div class="mb-3 col-6 form-floating">
                            <input list="junix-geral-url-list" type="text" name="<?= $form ?>-url" id="floatingUrl" class="form-control" value="<?= $junixConfiguracoes[$form]['url'] ?>" placeholder="URL">
                            <label for="floatingUrl">URL</label>
                        </div>

                        <datalist id="junix-geral-url-list">
                            <option value="https://api-gafisa-qa.imobflow.com.br">
                                https://api-gafisa-qa.imobflow.com.br
                            </option>
                        </datalist>

                        <div class="mb-3 col-6 form-floating">
                            <input type="text" name="<?= $form ?>-idProduto" id="floatingIdProduto" class="form-control" value="<?= $junixConfiguracoes[$form]['idProduto'] ?>" placeholder="Id Produto">
                            <label for="floatingIdProduto">Id Produto</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <input type="text" name="<?= $form ?>-usuario" id="floatingJunixUser" class="form-control" value="<?= $junixConfiguracoes[$form]['usuario'] ?>" placeholder="Usuário">
                            <label for="floatingJunixUser">Usuario</label>
                        </div>

                        <div class="mb-3 col-4 form-floating">
                            <input type="password" name="<?= $form ?>-senha" id="floatingJunixPassword" class="form-control" value="<?= $junixConfiguracoes[$form]['senha'] ?>" placeholder="Senha">
                            <label for="floatingJunixPassword">Senha</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <input type="text" name="<?= $form ?>-IdMidia" id="floatingJunixIdMidia" class="form-control" value="<?= $junixConfiguracoes[$form]['IdMidia'] ?>" placeholder="Id Midia">
                            <label for="floatingJunixIdMidia">Id Midia</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <input type="text" name="<?= $form ?>-Midia" id="floatingJunixMidia" class="form-control" value="<?= $junixConfiguracoes[$form]['Midia'] ?>" placeholder="Midia">
                            <label for="floatingJunixMidia">Midia</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <input type="text" name="<?= $form ?>-Origem" id="floatingJunixOrigem" class="form-control" value="<?= $junixConfiguracoes[$form]['Origem'] ?>" placeholder="Origem">
                            <label for="floatingJunixOrigem">Origem</label>
                        </div>

                        <div class="mb-3 col-6 form-floating">
                            <input type="text" name="<?= $form ?>-CanalTipo" id="floatingJunixCanalTipo" class="form-control" value="<?php if( isset($junixConfiguracoes[$form]['CanalTipo']) ){ echo $junixConfiguracoes[$form]['CanalTipo']; }else{ echo 'Email'; } ?>" placeholder="Canal Tipo">
                            <label for="floatingJunixCanalTipo">Canal Tipo</label>
                        </div>

                    </div>

                <?php else: ?>

                    <h5 class="text-center"> Configurações do formulário <b style="color: #007cb2; text-transform: capitalize;"><?= $form ?></b></h5>

                    <div class="row">


                        <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="<?= $form ?>-status" value="true" <?php if($junixConfiguracoes[$form]['status'] == true): ?>checked <?php endif ?> >
                            <label class="form-check-label">Status</label>
                        </div>


                    </div>

                <?php endif ?>




            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>




    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Produtos Cadastrados Na Conta <b>( <?= $junixConfiguracoes['geral']['usuario'] ?> )</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h4 class="text-center"> Lista de Produtos </h4>
                    <h6 class="text-center">
                        <span id="numeroProdutos-junix">

                        </span>
                        Cadastrados
                    </h6>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID Produto</th>
                                <th scope="col">Nome Produto</th>
                            </tr>
                        </thead>
                        <tbody id="produtos-junix">

                        </tbody>
                    </table>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>



    <script>

        function startJunix(){
            let produtos = junixGetProdutos();
            //console.log(produtos)

            $('#produtos-junix').html('');

            $('#numeroProdutos-junix').html(produtos.length)

            produtos.forEach(function(valor, chave){

                let linha = `<tr>
                                <th scope="row">`+valor['Id']+`</th>
                                <td colspan="2">`+valor['Nome']+`</td>
                            </tr>`

                $('#produtos-junix').append(linha)


            });

        }



        function junixGetProdutos(){

            let token = junixGetToken();

            let response = $.ajax({
                async: false,
                //contentType: "application/json; charset=utf-8",
                type: 'GET',
                url: '<?= $junixConfiguracoes['geral']['url'] ?>'+'/api/produto/listagem',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+token['access_token']);
                },
            });

            return response['responseJSON'];
        }

        function junixGetToken(){

            let data ={
                username: '<?= $junixConfiguracoes['geral']['usuario'] ?>',
                Password: '<?= $junixConfiguracoes['geral']['senha'] ?>',
                grant_type: 'password',
            }

            let response = $.ajax({
                async: false,
                contentType: "application/x-www.form-urlenconded",
                type: 'POST',
                url: '<?= $junixConfiguracoes['geral']['url'] ?>'+'/api/token',
                data: data
            });

            return response['responseJSON'];
        }

    </script>

