

    <h1> Informações Registro de Log: </h1>

    <br>


        <div class="row">


                <div class="form-check form-switch mb-3" style="margin-left: 20px;">
                    <input class="form-check-input" type="checkbox" name="status" <?php if($logConfiguracoes['status'] == true): ?>  checked <?php endif ?> >
                    <label class="form-check-label">Status</label>
                </div>

        </div>

        <button type="submit" class="btn btn-primary">Atualizar Configurações</button>


            <br><br><br><br>

            <h2> Registro de Leeds:
                <a class="btn btn-primary btn-sm" href="pacotesIntegracoes/log/integracao/log.csv" role="button" download>Donwload</a>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#limparLogs" role="button">Limpar Registros</a>
            </h2>

            <div class="row">

                <?php

                $nomeArquivo = 'pacotesIntegracoes/log/integracao/log.csv';

                $dados = [];
                if (($handle = fopen($nomeArquivo, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                        $dados[] = $data;
                    }
                    fclose($handle);
                }
                ?>

                    <div class="table-responsive-xl">
                      <table class="table">
                          <caption>Lista de Leeds</caption>
                        <thead>
                            <tr>
                                <?php foreach ($dados[0] as $thead): ?>
                                    <th scope="col"><?= $thead ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            unset($dados[0]);
                            $dados = array_reverse($dados);
                            foreach ($dados as $linha):
                            ?>
                            <tr>
                                <?php foreach ($linha as $item ): ?>
                                    <td><?= $item ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                      </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="limparLogs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Limpar Registros</h5>
                                </div>
                                <div class="modal-body">

                                    <h4 class="text-center"> Deseja Realmente Limpar Todos os Registros ? </h4>
                                    <h6 class="text-center">
                                        Está ação apagará todos os registros permanentemente!
                                    </h6>

                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-primary btn" href="pacotesIntegracoes/log/integracao/limparLog.php" role="button">Limpar Registros</a>
                                    <a class="btn btn-secondary btn" data-bs-dismiss="modal" role="button">Fechar</a>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>








