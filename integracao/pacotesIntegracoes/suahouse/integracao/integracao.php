<?php $thisIntegracao = 'suahouseConfiguracoes' ?>
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

    <!-- script remoto do CRM sua house -->
    <?php if( $suahouseConfiguracoes['url'] != '' ): ?>
        <script src="<?= $suahouseConfiguracoes['url'] ?>"></script>
    <?php endif ?>

    <script>
        /*********************************************************************************************
         * ************************************* Parâmetros ******************************************
         * *******************************************************************************************
         */

            // as variáveis começando com 'hc_' são usadas pelo script remoto housecrm como variáveis globais
        const hc_empreendimento = '<?= $suahouseConfiguracoes['hc_empreendimento']  ?>',
            hc_dominio_chat = '<?= $suahouseConfiguracoes['hc_dominio_chat']  ?>',
            hc_https = '<?= $suahouseConfiguracoes['hc_https']  ?>',
            hc_filial = '<?= $suahouseConfiguracoes['hc_filial']  ?>',
            hcInformacao = '<?= $suahouseConfiguracoes['hcInformacao']  ?>',
            hcCampanha = '<?= $suahouseConfiguracoes['hcCampanha']  ?>';

        /**
         * Função Padrão que Realizará a Integração da Portal do Corretor
         * @param formularioDados
         * @param dispositivo
         * @param parametrosUrl
         */
        function suahouseAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
        {
            //alert('Dentro Aplica Integração Sua House');
            let resposta = {};

            let response = sendToHouseCrm(hc_empreendimento, formularioDados['nome'], formularioDados['email'], formularioDados['ddd'], formularioDados['telefoneSemDDD'],
                formularioDados['mensagem'], hc_filial, hcInformacao, hcCampanha);

            response.always(function(data){

                //console.log(data)

                let status = data['status'];

                resposta = {
                    'status': false,
                    'mensagem': 'Resposta Padrão ',
                };

                if(status == 500){
                    resposta = {
                        'status': false,
                        'mensagem': 'Erro 500, Possivelmente Id Incorreto',
                    };
                }

            })

            return resposta;

        }

        /*********************************************************************************************
         * ************************************** Funções ********************************************
         * *******************************************************************************************
         */

        function sendToHouseCrm(
            codigoEmpreendimento='', nomeCliente='', emailCliente='', dddCliente='',
            telefoneCliente='', mensagem='', codFilial='', informacao='', campanha='', cpf=''
        )
        {
            return hc_envia_mensagem(
                codigoEmpreendimento,
                nomeCliente,
                emailCliente,
                dddCliente,
                telefoneCliente,
                mensagem,
                codFilial,
                informacao,
                campanha,
                cpf
            );
        }
    </script>





<?php endif; ?>