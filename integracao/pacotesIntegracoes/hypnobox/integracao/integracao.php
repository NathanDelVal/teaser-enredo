<?php $thisIntegracao = 'hypnoboxConfiguracoes' ?>
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
/*********************************************************************************************
 * ************************************* Parâmetros ******************************************
 * **************************************************************************************** */

/**
 * Função Padrão que Realizará a Integração da Portal do Corretor
 * @param formularioDados
 * @param dispositivo
 * @param parametrosUrl
 */
function hypnoboxAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
{
    let resposta = {
        'status': '',
        'mensagem': '',
    };

    if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
        return resposta
    }

    let response = sendToHypnobox(formularioDados);

    response.always(function(data){

        //console.log(data);

        let erro = data['erro'];

        if(erro === "NULL"){
            resposta = {
                'status': true,
                'mensagem': 'Leed Cadastrado | ID = '+ data['id'],
            }
        }else{
            resposta = {
                'status': false,
                'mensagem': erro,
            }
        }

    })

    return resposta;
}



/*********************************************************************************************
 * ************************************** Funções ********************************************
 * *******************************************************************************************
*/

        /**
         * @param formularioDados
         * @return {*}
         */
        function sendToHypnobox(formularioDados) {

            let utm_source   = ( (formularioDados['utm_source'] === 'Acesso Direto' ) ? 'vazio' : formularioDados['utm_source'] );
            let utm_medium   = ( (formularioDados['utm_medium'] === 'Acesso Direto' ) ? 'vazio' : formularioDados['utm_medium'] );
            let utm_campaign = ( (formularioDados['utm_campaign'] === 'Acesso Direto' ) ? 'vazio' : formularioDados['utm_campaign'] );

            let midia = ''
            if(utm_source === 'vazio' && utm_medium === 'vazio'){
                midia = `<?= $hypnoboxConfiguracoes['geral']['midia'] ?>`
            }else{
                midia = `${utm_source}-${utm_medium}`;
            }

            return $.ajax({
                type: 'POST',
                async: false,
                url: `<?= $hypnoboxConfiguracoes['geral']['url'] ?>`,
                data: `nome=${formularioDados['nome']}`+
                    `&email=${formularioDados['email']}`+
                    `&id_produto=${<?= $thisIntegracao ?>[formularioDados['formNome']]['idProduto']}`+
                    `&mensagem=${formularioDados['mensagem']}`+
                    `&ddd_celular=${formularioDados['ddd']}`+
                    `&tel_celular=${formularioDados['telefoneSemDDD']}`+
                    `&midia=${midia}`,
            })

        }

</script>

<?php endif; ?>