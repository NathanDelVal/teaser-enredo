<?php if($logConfiguracoes['status'] == true): ?>


<script>
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
     * @param respostaIntegracoes
     */
    function logAplicarIntegracao(formularioDados, dispositivo, parametrosUrl, respostaIntegracoes)
    {
        //alert('Dentro de Aplica Integracao Log');

        let resposta = {};

        let response = geraLog(formularioDados, respostaIntegracoes);

        response.always(function(data){
            resposta = {
                'status': data,
                'mensagem': 'Ok'
            };
        })

        return resposta;

    }

    function geraLog(formularioDados, respostaIntegracoes){
        return $.ajax({
            async: false,
            type: 'POST',
            url: '<?= $urlIntegracao ?>/pacotesIntegracoes/log/integracao/geraLog.php',
            data: { formularioDados, respostaIntegracoes }
        });
    }


</script>

<?php endif; ?>