<?php $thisIntegracao = 'anaproConfiguracoes' ?>
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

/**
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
 **/

/*********************************************************************************************
 * ************************************** Funções ********************************************
 * *******************************************************************************************
*/


/**
 * @param formularioDados
 * @param dispositivo
 * @param parametrosUrl
 * @return {string}
 */
function anaproAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
{
    let resposta = {
        'status': '',
        'mensagem': '',
    };

    if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
        return resposta
    }

    let response = sendToAnaPro(formularioDados, <?= $thisIntegracao ?>[formularioDados['formNome']]);

    response.always(function(data) {

        resposta = {
            'status': data['Sucesso'],
            'mensagem': data['Mensagem'],
        };

    })

    return resposta;

}

function sendToAnaPro(formularioDados, anaproConfigs)
{
  
  dados = {
    "Key": anaproConfigs['Key'],
    "TagAtalho": "",
    "CampanhaKey": anaproConfigs['CampanhaKey'],
    "ProdutoKey": anaproConfigs['ProdutoKey'],
    "CanalKey": anaproConfigs['CanalKey'],
    "Midia": urlParam('utm_source'),
    "Peca": urlParam('utm_medium'),
    "GrupoPeca": "",
    "CampanhaPeca": urlParam('utm_campaign'),
    "PessoaNome": formularioDados['nome'],
    "PessoaSexo": "",
    "PessoaEmail": formularioDados['email'],
    "PessoaTelefones": [{
        "Tipo": "OUTR",
        "DDD": formularioDados['ddd'],
        "Numero": formularioDados['telefoneSemDDD'],
        "Ramal": null
    }],
    "Observacoes": formularioDados['mensagem'],
    "Status": "",
    "KeyExterno": "",
    "KeyIntegradora": anaproConfigs['KeyIntegradora'],
    "KeyAgencia": anaproConfigs['KeyAgencia']
  };


    return jQuery.ajax({
    url: 'https://crm.anapro.com.br/webcrm/webapi/integracao/v2/CadastrarProspect',
    data: dados,
    async: false,
    crossDomain: true,
    cache: false,
    type: 'POST',
    dataType: 'json'
        /*
    success: function (response) {
      //console.log(response);
      return true;
    },
    error: function(result) {
      //console.log(result);
      return false;
    }
    */
  });

}
</script>

<?php endif; ?>