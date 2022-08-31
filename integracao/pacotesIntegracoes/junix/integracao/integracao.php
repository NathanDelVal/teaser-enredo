<?php $thisIntegracao = 'junixConfiguracoes' ?>
<?php if($$thisIntegracao['geral']['status'] == true): ?>

    <script>
        let <?= $thisIntegracao ?> = {
            <?php foreach ( $formConfiguracoes as $form ): ?>
            '<?= $form ?>':{
                <?php foreach ( $$thisIntegracao[$form] as $index => $value ): ?>
                '<?= $index ?>': '<?= $value ?>',
                <?php endforeach; ?>
            },
            <?php endforeach; ?>
        }

        /**
         * Função Padrão que Realizará a Integração da Portal do Corretor
         * @param formularioDados
         * @param dispositivo
         * @param parametrosUrl
         */
        function junixAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
        {
            //alert('Dentro de Aplica Integracao Junix');

            let resposta = {
                'status': '',
                'mensagem': '',
            };

            if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
                return resposta
            }

            let reponseToken = junixGetToken();

            if(reponseToken['error']){
                resposta = {
                    'status': false,
                    'mensagem': reponseToken['error'] + ' - ' + reponseToken['error_description'],
                };
            }

            if(reponseToken['access_token']){
                responseLeed = junixSendLeed(formularioDados, reponseToken);

                responseLeed.always(function(data){
                    resposta = {
                        'status': data['OK'],
                        'mensagem': 'Id Gerado: ' + data['Dados'].Id + " - Mensagem: " + data['Mensagem'] ,
                    };
                })

            }

            return resposta;

        }

        function junixSendLeed(formularioDados, token){

            let data = {
                "IdExterno": formularioDados['formId'],
                "IdProduto": '<?= $junixConfiguracoes['geral']['idProduto'] ?>',
                "Nome": formularioDados['nome'],
                "Email": formularioDados['email'],
                "Telefone": formularioDados['telefoneCompleto'],
                "Mensagem": formularioDados['mensagem'],
                "CanalTipo": '<?= $junixConfiguracoes['geral']['CanalTipo'] ?>',
                "IdMidia": '<?= $junixConfiguracoes['geral']['IdMidia'] ?>',
                "Midia": '<?= $junixConfiguracoes['geral']['Midia'] ?>',
                "Origem": '<?= $junixConfiguracoes['geral']['Origem'] ?>',
                "utm_source": urlParam('utm_source'),
                "utm_campaign": urlParam('utm_campaign'),
                "utm_medium": urlParam('utm_medium'),
            }

            //let utms = "?utm_source="+urlParam('utm_source')+"&utm_campaign="+urlParam('utm_campaign')+"&utm_medium="+urlParam('utm_medium');

            return $.ajax({
                async: false,
                type: 'POST',
                contentType: "application/json; charset=utf-8",
                url: '<?= $junixConfiguracoes['geral']['url'] ?>' + '/api/lead/incluir',
                data: JSON.stringify(data),
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+ token['access_token']);
                },
            });

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
                url: '<?= $junixConfiguracoes['geral']['url'] ?>' + '/api/token',
                data: data
            });

            return response['responseJSON'];
        }

    </script>



<?php endif; ?>