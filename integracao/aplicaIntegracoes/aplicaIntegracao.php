<script>

    /*******************************************************************************************
     * ***************** Gera Script de Processamento para cada form Registrado ****************
     * ************************************************************************************** */

    $(document).ready(function() {

        <?php foreach ( $formConfiguracoes as $form ): ?>

            $('#form-<?= $form ?>').submit(function(e) {

                e.preventDefault();

                const form = $(this).closest('form');
                const count = checkNotNull(form.attr('id'));

                if (count == 0) {
                    aplicaIntegracoes(form);
                }

            });

        <?php endforeach; ?>

        /** Validada Email E Chama Call Back Pro Front Tratar */
        $("[name='Email']").blur(function() {
            frontValidacaoEmail( $(this), validacaoTelefone($(this).val()) );
        });

        /** Validada Telefone E Chama Call Back Pro Front Tratar */
        $("[name='Telefone']").blur(function() {
            frontValidacaoTelefone( $(this), validacaoTelefone($(this).val()) );
        });


    });


    /*******************************************************************************************
     * *************************** Função que chama as integrações *****************************
     * *****************************************************************************************
     */

    /** @param {*} form */
    function aplicaIntegracoes(form)
    {

        /** Pega Todas As Informações Do Fomulario Enviado e Joga Em Variaveis */
        let formId = form.attr('id');
        let formNome = formId.replace('form-', '');
        let nome = $(`#${formId} [name="Nome"]`).val();
        let telefoneCompleto = $(`#${formId} [name="Telefone"]`).val();
        let telefoneSemDDD = telefoneCompleto != null ? telefoneCompleto.substr(5, telefoneCompleto.length) : '';
        let ddd = telefoneCompleto != null ? telefoneCompleto.substr(1, 2) : '';
        let email = $(`#${formId} [name="Email"]`).val();
        let mensagem = $(`#${formId} [name="Mensagem"]`).val();
        let termos = $(`#${formId} [name="Termos"]`).val();

        /** VALIDAR QUANTIDADE CARACTERES TELEFONE */
        if( !validacaoTelefone(telefoneCompleto) ){ return; }

        /** VALIDAR EMAIL */
        if(typeof(email) !== 'undefined'){
            if( !validacaoEmail( email ) ){ return; }
        }else{
            email = '';
        }

        /** Pega Informações Do Formulario E constroi Um objeto Com Os Dados  */
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
            'utm_source': urlParam('utm_source'),
            'utm_medium': urlParam('utm_medium'),
            'utm_campaign': urlParam('utm_campaign'),
        };

        /** CALL BACK PRO FRONT - PROCESSANDO FORMULARIO */
        let argsFormProcessando = frontFormularioProcessando(formularioDados);


        /** Timer para processamento dos dados do front */
        setTimeout(function () {


        <?php ############################################################################################################################################ ?>
        <?php #Percorre todas integrações chamando suas respectivas funções caso esteja abilitada! ?>
        <?php
            foreach ($integracoes as $indice => $integracao):
            if( in_array($integracao, $integracoesExcecao) ){ continue; }

            #Cria Variavel Dinamica para cada Integração
            $integracaoConfiguracoes = $integracao . 'Configuracoes';

            if( $$integracaoConfiguracoes['geral']['status'] == true ):
        ?>

        /** Funcão integra com <?= $integracao ?> retorna True Ou False Para A Variavel <?= $integracao . 'Resposta' ?> */
        let <?= $integracao . 'Resposta' ?> = <?= $integracao ?>AplicarIntegracao(formularioDados, dispositivo, parametrosUrl );

        <?php endif; endforeach; ?>
        <?php ############################################################################################################################################ ?>



        <?php ############################################################################################################################################ ?>
        <?php #Percorre todas integrações ?>
        let respostaIntegracoes = {
            <?php
            foreach ($integracoes as $indice => $integracao):
                if( in_array($integracao, $integracoesExcecao) ){ continue; }

                $integracaoConfiguracoes = $integracao . 'Configuracoes';

                if( $$integracaoConfiguracoes['geral']['status'] == true ):
            ?>

            <?= $integracao . 'Resposta' ?>,

            <?php endif; endforeach; ?>
        };
        <?php ############################################################################################################################################ ?>


        <?php # Chama o gerador de logs ?>
        <?php if( $logConfiguracoes['status']): ?>
            logAplicarIntegracao(formularioDados, dispositivo, parametrosUrl, respostaIntegracoes)
        <?php endif; ?>


        /** Chama funcao que valida quantas integracoes foram realizadas .... */
        let statusIntegracao = validaIntegracoesRealizadas(respostaIntegracoes)


        /** CALL BACK PRO FRONT - FORMULARIO PROCESSADO */
        frontFormularioProcessado(argsFormProcessando, formularioDados, statusIntegracao);

        /** End Timer para processamento dos dados do front */
        }, 1000)

    }

</script>