 <?php $thisIntegracao = 'ga4Configuracoes' ?>


 <?php if($$thisIntegracao['geral']['status'] == true): ?>

     <?php ####################################################################################################################################### ?>
     <?php # Start Google Tag Manager ############################################################################################################ ?>
     <?php if($gtagConfiguracoes['geral']['idGa4'] !== ""): ?>
         <noscript>
             <iframe src="https://www.googletagmanager.com/ns.html?id=<?= $gtagConfiguracoes['geral']['idGa4'] ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
         </noscript>
     <?php endif; ?>
     <?php #End Google Tag Manager ############################################################################################################### ?>
     <?php ####################################################################################################################################### ?>

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

<!-- Global site tag (gtag.js) - Google Analytics -->

    /**
     * Função Padrão que Realizará a Integração da Anapro
     * @param formularioDados
     * @param dispositivo
     * @param parametrosUrl
     */
    function gtagAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
    {
        //alert('GTag Aplicar Integração')
        let resposta = {
            'status': '',
            'mensagem': '',
        };

        if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
            return resposta
        }

        resposta = {
            'status': true,
            'mensagem': 'Sem Resposta Padrão - Validar No Google',
        };

        return resposta;
    }

    /**
     * @param formularioDados
     * @param gtagConfigs
     */
    function sendGtag(formularioDados, gtagConfigs)
    {

        gtag('event', gtagConfigs['event'] , {
            'event_category': gtagConfigs['event_category'],
            'event_label'   : gtagConfigs['event_label'],
        });

    }

    </script>

<?php endif; ?>