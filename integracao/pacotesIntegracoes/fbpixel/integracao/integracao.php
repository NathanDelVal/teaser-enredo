<?php $thisIntegracao = 'fbpixelConfiguracoes' ?>
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

<!-- Facebook Pixel Code -->
    /**
     * Função Padrão que Realizará a Integração da Anapro
     * @param formularioDados
     * @param dispositivo
     * @param parametrosUrl
     */
    function fbpixelAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
    {

        //alert('FB Pixel Aplica Integração')

        let resposta = {
            'status': '',
            'mensagem': '',
        };

        if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
            return resposta
        }

        sendFbq(formularioDados, <?= $thisIntegracao ?>[formularioDados['formNome']]);

        resposta = {
            'status': true,
            'mensagem': 'Usar Plugin (FB Pixel Helper) Para Validar',
        };

        return resposta;
    }


    /**
     * Envia eventos de fbq para um form de contato.
     * Dentro desta função, você pode fazer tantas chamadas a fbq quanto for necessário.
     */
    function sendFbq(formularioDados, fbpixelConfigs){
        fbq('track', fbpixelConfigs['track'], {
            'content_name': fbpixelConfigs['content_name'],
        });
    }

</script>


<?php endif; ?>