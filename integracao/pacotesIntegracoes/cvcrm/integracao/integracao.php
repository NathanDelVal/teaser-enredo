<?php $thisIntegracao = 'cvcrmConfiguracoes' ?>
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
function cvcrmAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
{
    let resposta = {
        'status': '',
        'mensagem': '',
    };

    if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
        return resposta
    }

    let response = sendToCvCrm(formularioDados);

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
        function sendToCvCrm(formularioDados) {

            return $.ajax({
                type: 'POST',
                async: false,
                url: `<?= $cvcrmConfiguracoes['geral']['url'] ?>`,
                dataType: 'json',
                data: {
                    idempreendimento: <?= $thisIntegracao ?>[formularioDados['formNome']]['idEmpreendimento'],
                    nome: formularioDados['nome'],
                    email: formularioDados['email'],
                    mensagem: formularioDados['mensagem'],
                    telefone: formularioDados['telefoneCompleto'],
                    formularioPreenchido: formularioDados['formNome'],
                    utm_source: formularioDados['utm_source'],
                    utm_medium: formularioDados['utm_medium'],
                    utm_campaign: formularioDados['utm_campaign'],
                },
            })

            /*data: `nome=${formularioDados['nome']}`+
                `&email=${formularioDados['email']}`+
                `&idempreendimento=${<?= $thisIntegracao ?>[formularioDados['formNome']]['idEmpreendimento']}`+
                    `&mensagem=${formularioDados['mensagem']}`+
                    `&telefone=${formularioDados['telefoneCompleto']}`+
                    `&utm_source=${formularioDados['utm_source']}`+
                    `&utm_medium=${formularioDados['utm_medium']}`+
                    `&utm_campaign=${formularioDados['utm_campaign']}`+
                    `&tags=${formularioDados['formNome']}`*/
        }

</script>

<?php endif; ?>