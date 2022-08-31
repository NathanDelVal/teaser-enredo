<?php $thisIntegracao = 'novocrmConfiguracoes' ?>
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
 * Função Padrão que Realizará a Integração da Portal do Corretor
 * @param formularioDados
 * @param dispositivo
 * @param parametrosUrl
 */
function novocrmAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
{
    let resposta = {
        'status': '',
        'mensagem': '',
    };

    if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
        return resposta
    }

    let response = sendToCRM(formularioDados, dispositivo, <?= $thisIntegracao ?>[formularioDados['formNome']]);

    response.always(function(data){

        let status = data['status'];

        resposta = {
            'status': true,
            'mensagem': 'Leed Enviado ',
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

/**
 * 
 * @param {*} formularioDados
 * @param {*} dispositivo
 * @param {*} novocrmConfigs
 */
function sendToCRM(formularioDados, dispositivo, novocrmConfigs) {

    return $.ajax({
        type: 'POST',
        async: false,
        url: `https://www.novocrm.atendimentoon.com.br/api/form/externo/`+novocrmConfigs['id'],
        data: {
            'apiNome': formularioDados['nome'],
            'apiEmail': formularioDados['email'],
            'apiTelefone1': formularioDados['telefoneCompleto'],
            'apiDispositivo': dispositivo,
            'apiOrigem': 'Site',
            'utm_source': formularioDados['utm_source'],
            'utm_medium': formularioDados['utm_medium'],
            'utm_campaign': formularioDados['utm_campaign'],
        },
  })

}

</script>

<?php endif; ?>