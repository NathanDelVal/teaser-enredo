<?php $thisIntegracao = 'portaldocorretorConfiguracoes' ?>
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
    function portaldocorretorAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
    {
        let resposta = {
            'status': 'true',
            'mensagem': 'Sem Resposta- Validar No CRM',
        };

        if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
            return resposta
        }

        let response = integratePortal(formularioDados);

        response.always(function(data) {

            let mensagem = data['message'];
            let status = data['status'];

            //console.log(data)
            resposta = {
                'status': false,
                'mensagem': 'Erro Indefinido, Verificar Post para Mais Informações',
            };

            if(status === 404) {

                resposta = {
                    'status': false,
                    'mensagem': 'Verificar Erro De Cors e Token',
                }

                if(data['responseJSON']){
                    resposta['mensagem'] = data['responseJSON']['message']
                    if(data['responseJSON']['message'] === 'Product not found'){
                        resposta['mensagem'] = 'Produto não encontrado - Verificar o Token'
                    }
                }

            }

            if(mensagem === 'Lead created'){
                resposta = {
                    'status': true,
                    'mensagem': 'Leed Criado Com Sucesso',
                };
            }

        })

        return resposta;

    }

function integratePortal(formularioDados)
{
    let lead =  {
        "name": formularioDados['nome'],
        "email": formularioDados['email'],
        "phone": formularioDados['telefoneCompleto'],
        "origem": document.location.host,
        "group": portaldocorretorConfiguracoes[formularioDados['formNome']]["group"],
        "token": '<?= $portaldocorretorConfiguracoes['geral']["token"] ?>',
        "utm_source": formularioDados['utm_source'],
        "utm_medium": formularioDados['utm_medium'],
        "utm_campaign": formularioDados['utm_campaign'],
    }

    return jQuery.ajax({
        "type": "POST",
        "async": false,
        "url": '<?= $portaldocorretorConfiguracoes['geral']["url"] ?>',
        "data": JSON.stringify(lead),
    })
}

//"url": 'https://portal.descomplicavendas.com.br/api/leads/send',
// "url": 'https://volendam.descomplicavendas.com.br/api/leads/send',

</script>


<?php endif; ?>