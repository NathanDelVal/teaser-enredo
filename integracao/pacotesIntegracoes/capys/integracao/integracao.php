 <?php $thisIntegracao = 'capysConfiguracoes' ?>
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

<!-- Global site tag (gtag.js) - Google Analytics -->

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

    /**
     * Função Padrão que Realizará a Integração da Anapro
     * @param formularioDados
     * @param dispositivo
     * @param parametrosUrl
     */
    function capysAplicarIntegracao(formularioDados, dispositivo, parametrosUrl)
    {
        let resposta = {
            'status': '',
            'mensagem': '',
        };

        if(<?= $thisIntegracao ?>[formularioDados['formNome']]['status'] === ''){
            return resposta
        }

        sendCapys(formularioDados, <?= $thisIntegracao ?>[formularioDados['formNome']]);

        resposta = {
            'status': true,
            'mensagem': 'cadastrado',
        };

        return resposta;
    }

    /**
     * @param formularioDados
     * @param gtagConfigs
     */
    function sendCapys(formularioDados, gtagConfigs)
    {

        $.ajax({
            type: "POST",
            url: '<?= $capysConfiguracoes['geral']['URL'] ?>',
            data: {
                ID_ORGANIZACAO: '<?= $capysConfiguracoes['geral']['ID_ORGANIZACAO'] ?>',
                ID_ORIGEM_LEAD: '<?= $capysConfiguracoes['geral']['ID_ORIGEM_LEAD'] ?>',
                FL_WEB_TO_LEAD: '<?= $capysConfiguracoes['geral']['FL_WEB_TO_LEAD'] ?>',
                DS_NOME: formularioDados['nome'],
                DS_EMAIL: formularioDados['email'],
                NR_TELEFONE: formularioDados['telefoneCompleto'],
                DS_DESCRICAO_CASO: formularioDados['descricao'],
            }
        });

    }

    </script>

<?php endif; ?>