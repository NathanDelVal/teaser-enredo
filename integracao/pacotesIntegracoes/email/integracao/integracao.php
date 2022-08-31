<?php $thisIntegracao = 'emailConfiguracoes' ?>
<?php if($$thisIntegracao['geral']['status'] == true): ?>

    <script>
        let <?= $thisIntegracao ?> = {
            <?php foreach ( $formConfiguracoes as $form ): ?>
            '<?= $form ?>': {
                <?php foreach ( $$thisIntegracao[$form] as $index => $value ): if($index === 'sendTo'){ continue; }?>
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
        function emailAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
        {
            //alert('Dentro de Aplica Integracao Email');
            let resposta = {
                'status': '',
                'mensagem': '',
            };

            if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
                return resposta
            }

            let response = sendMail(formularioDados);

            response.always(function(data){

                if(data['status']){
                    resposta = {
                        'status': true,
                        'mensagem': 'Emails Enviado Para: ' + data['emailEnviados'],
                    };
                }else {
                    resposta = {
                        'status': false,
                        'mensagem': 'Erro Ao Enviar Emails!',
                    };
                }

            })

            return resposta;

        }

        function sendMail(formularioDados){
            return $.ajax({
                async: false,
                type: 'POST',
                url: '<?= $urlIntegracao ?>/pacotesIntegracoes/email/integracao/email.php',
                data: formularioDados
            });
        }


    </script>

<?php endif; ?>