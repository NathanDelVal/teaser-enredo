<?php $thisIntegracao = 'whatsappConfiguracoes' ?>
<?php if($$thisIntegracao['geral']['status'] == true): ?>

    <script>
        let <?= $thisIntegracao ?> = {
            <?php foreach ( ['geral'] as $form ): ?>
            '<?= $form ?>':{
                <?php foreach ( $$thisIntegracao[$form] as $index => $value ): ?>
                '<?= $index ?>': '<?= $value ?>',
                <?php endforeach; ?>
            },
            <?php endforeach; ?>
        }

/*********************************************************************************************
 * ************************************* Parâmetros ******************************************
 * *******************************************************************************************
 */


        /**
         * Função Padrão que Realizará a Integração da Portal do Corretor
         * @param formularioDados
         * @param dispositivo
         * @param parametrosUrl
         */
        function whatsappAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
        {
            let resposta = {
                'status': '',
                'mensagem': '',
            }

            if(<?= $thisIntegracao ?>['geral']['formulario'] !== formularioDados['formNome']){
                return resposta
            }
            let numero = <?= $thisIntegracao ?>['geral']['numero']
            let texto = <?= $thisIntegracao ?>['geral']['texto']

            let url = `https://api.whatsapp.com/send?phone=${numero}&text=${texto}`;
            
            if(/iPad|iPhone|iPod/.test(navigator.userAgent))
                location.href = url;
            else
                window.open(url,'_blank');

            return resposta
        }


    </script>

<?php endif; ?>