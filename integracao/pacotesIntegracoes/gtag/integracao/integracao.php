 <?php $thisIntegracao = 'gtagConfiguracoes' ?>
 <?php if($$thisIntegracao['geral']['status'] == true): ?>

     <?php ####################################################################################################################################### ?>
     <?php #  Start Google Tag Manager ############################################################################################################ ?>
     <?php if($gtagConfiguracoes['geral']['idTagManager'] !== ""): ?>
         <!-- NoScript - Google Tag Manager (GTM)  -->
         <noscript>
             <iframe src="https://www.googletagmanager.com/ns.html?id=<?= $gtagConfiguracoes['geral']['idTagManager'] ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
         </noscript>
     <?php endif; ?>
     <?php #End Google Tag Manager ############################################################################################################### ?>
     <?php ####################################################################################################################################### ?>


    <?php ####################################################################################################################################### ?>
    <?php # Start Google Analytics Tag ########################################################################################################## ?>
     <?php if($gtagConfiguracoes['geral']['idAnalytics'] !== ""): ?>
         <!--  NoScript - Global Site Tag - Google Analytics  -->
         <noscript>
             <iframe src="https://www.googletagmanager.com/ns.html?id=<?= $gtagConfiguracoes['geral']['idAnalytics'] ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
         </noscript>
     <?php endif; ?>
     <?php #End Google Analytics Tag ############################################################################################################# ?>
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

        sendGtag(formularioDados, <?= $thisIntegracao ?>[formularioDados['formNome']]);

        resposta = {
            'status': true,
            'mensagem': 'Sem Resposta Padrão - Validar No CRM',
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