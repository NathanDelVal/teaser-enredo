
/** DADOS DO OBJETO FORMULARIO DADOS

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
 *  CALL COSNTRUCT FUNCTION FORM
 * 
 *  @param Form - É função construtora com as ações frontEnd de validação do Formulário.
 *  @param $form - Objeto instanciado para manipular as informações. 
 */


let $form = new Form();


/**
 * É EXECUTADA ANTES DO PROCESSAMENTO/INTEGRACOES DO FORMULARIO
 *
 * @param formularioDados - Recebe um objeto que possui todads as informações do formulario
 * @return {*[]} - Retorna Array que é recebido como parametro na função formularioProcessado()
 */
function frontFormularioProcessando(formularioDados){


    $("#form-botao-"+formularioDados['formNome']).prop("disabled",true);


    $form.submit = document.querySelector("#form-botao-"+formularioDados['formNome']) //Captura o botão Submit
    //console.log($form.submit);
    $form.action_load(); //Adicionando ação ao botão Submit

    return [ ];
}


/**
 * É EXECUTADO APOS O PROCESSAMENTO/INTEGRACOES DO FORMULARIO
 *
 * @param argsFormProcessando - Argumentos Retornados Pela Função formularioProcessando()
 * @param formularioDados - Traz Todas as Informação do Formulario
 * @param statusIntegracao - { TRUE OR FALSE } Vai Retornar Se O Formulario Foi Processado Corretamente
 */
function frontFormularioProcessado(argsFormProcessando, formularioDados, statusIntegracao){


    $("#form-botao-"+formularioDados['formNome']).prop("disabled", false);
    $("#"+formularioDados['formId'])[0].reset();

    if(statusIntegracao){
     /*   if(formularioDados['formNome'].toLowerCase() == "whatsapp" ||  formularioDados['formNome'].toLowerCase()  == 'wpp'){
            $form.response_final({
                response: true,
                type: 'wpp'
            })
       }else{*/
            $form.response_final({
                response: true
            }) 
       //}
    }else{
        $form.response_final({
            response: false
        })
    }


}



/**
 * Função de call back para fazer validação visual de Email para o Usuario
 * Roda toda vez que usuario seleciona o input de Email
 *
 * @param labelEmail - Referencia do input JQUERY
 * @param status - { TRUE OR FALSE } Vai Referenciar se o email preenchido pelo usuario é valido ou não
 */
function frontValidacaoEmail(labelEmail, status){

    if(status){

        labelEmail.css('border', '');

    }else{

        labelEmail.css('border', '1px red solid');

    }


}


/**
 * Função de call back para fazer validação visual de Telefone para o Usuario
 * Roda toda vez que usuario seleciona o input de Telefone
 *
 * @param labelTelefone - Referencia do input JQUERY
 * @param status - { TRUE OR FALSE } Vai Referenciar se o telefone preenchido pelo usuario é valido ou não
 */
function frontValidacaoTelefone(labelTelefone, status){

    if(status){

        labelTelefone.css('border', '');

    }else{

        labelTelefone.css('border', '1px red solid');

    }

}
