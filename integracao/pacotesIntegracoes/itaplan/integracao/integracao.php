<?php $thisIntegracao = 'itaplanConfiguracoes' ?>
<?php if($$thisIntegracao['geral']['status'] == true): ?>

    <script>
        let <?= $thisIntegracao ?> = {
            <?php foreach ( $formConfiguracoes as $form ): ?>
            '<?= $form ?>': {
                <?php foreach ( $$thisIntegracao[$form] as $index => $value ): ?>
                '<?= $index ?>': '<?= $value ?>',
                <?php endforeach; ?>
            },
            <?php endforeach; ?>
        }
        /*********************************************************************************************
         * ************************************** Funções ********************************************
         * *******************************************************************************************
         */

        /*
         let formularioDados = {
                'formId': formId,
                'formNome': formNome,
                'nome': nome,
                'email': email,
                'telefoneCompleto': telefoneCompleto,
                'telefoneSemDDD': telefoneSemDDD,
                'ddd': ddd,
                'mensagem': mensagem,
                'termos': termos,
              };
        */

        /**
         * Função Padrão que Realizará a Integração da Anapro
         * @param formularioDados
         * @param dispositivo
         * @param parametrosUrl
         */

        function itaplanAplicarIntegracao(formularioDados, dispositivo, parametrosUrl) {

            //alert('Dentro Aplica Integração Itaplan');
            let resposta = {
                'status': '',
                'mensagem': '',
            };

            if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
                return resposta
            }

            let response = iniciarIntegracaoItaplan(formularioDados, '<?= $itaplanConfiguracoes['geral']["usuario"] ?>', '<?= $itaplanConfiguracoes['geral']["senha"] ?>');

            response.always(function(data){

                let status = data['Sucesso'];
                let id = data['Id'];

                if(status){
                    resposta = {
                        'status': true,
                        'mensagem': 'Leed Cadastrado - ID Gerado: '+ id,
                    };
                }else{
                    resposta = {
                        'status': false,
                        'mensagem': 'Erro ao cadastar leed - Erro: '+ data['Erros'],
                    };
                }

            })

            return resposta;

        }

        /**
         *
         * @param {*} usuario
         * @param {*} senha
         */
        function obterToken(usuario, senha) {
            return new Promise((resolve) => {
                $.ajax({
                    crossDomain: true,
                    contentType: 'application/x-www-form-urlencoded',
                    type: 'POST',
                    url: 'https://itaplan.sigavi360.com.br/Sigavi/api/Acesso/Token',
                    data: `username=${usuario}&password=${senha}&grant_type=password`,
                    success: function (data) {
                        resolve(data.access_token);
                    },
                    error: function (data) {
                        //console.log('Erro na autenticação!');
                        //console.log(data);
                    }
                });
            });
        }

        /**
         *
         * @param {*} formularioDados
         * @param {*} usuario
         * @param {*} senha
         */
        function iniciarIntegracaoItaplan(formularioDados, usuario, senha) {

            let lead = {
                "Email": formularioDados['email'],
                "Empreendimento": true,
                "Forma": formularioDados['FormaDeContato'],
                "Nome":	formularioDados['nome'],
                "Referencia": '<?= $itaplanConfiguracoes['geral']["Referencia"] ?>',
                "Telefone":	formularioDados['telefoneCompleto'],
                "tipo":	formularioDados['formNome'],
                'utm_source': formularioDados['utm_source'],
                'utm_medium': formularioDados['utm_medium'],
                'utm_campaign': formularioDados['utm_campaign'],
            }

            let promise = obterToken(usuario, senha);

            let token = promise.then(token => {
                return token
            })

            return registrarLead(token, lead);
        }

        /**
         *
         * @param {*} token
         * @param {*} lead
         */
        function registrarLead(token, lead) {

            return $.ajax({
                url: 'https://itaplan.sigavi360.com.br/Sigavi/api/Leads/NovaLead',
                type: 'POST',
                async: false,
                dataType: 'JSON',
                contentType: 'application/json',
                data: JSON.stringify(lead),
                beforeSend: function (request) {
                    request.setRequestHeader('Authorization', `Bearer ${token}`);
                },
            });

        }

    </script>

<?php endif; ?>