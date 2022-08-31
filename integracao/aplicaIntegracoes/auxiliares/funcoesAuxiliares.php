<script>

function objectForm(pares) {
  let obj = {};
  pares.forEach(par => {
    obj[par['name']] = par['value'];
  });
  return obj;
}

function urlParam(name) {
  var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
    window.location.href
  );
  if (results == null) {
    return "Acesso Direto";
  } else {
    return decodeURI(results[1]) || "Acesso Direto";
  }
}

function checkNotNull(form) {
  var count = 0;
  jQuery(form + ' [required="required"]').each(function(index) {
    if (
      jQuery(this).attr("type") == "checkbox" ||
      jQuery(this).attr("type") == "radio"
    ) {
      if (!jQuery(this).is(":checked")) {
        count += 1;
        jQuery(this).css("border-bottom", "1px solid red");
      } else {
        jQuery(this).css("border-bottom", "1px solid #d6d6d6");
      }
    } else {
      if (jQuery(this).val() == "") {
        count += 1;
        jQuery(this).css("border-bottom", "1px solid red");
      } else {
        jQuery(this).css("border-bottom", "1px solid #d6d6d6");
      }
    }
  });
  return count;
}


function validacaoTelefone(telefone) {

    if(telefone.length < 14){
        return false;
    }else{
        return true;
    }

}


function validacaoEmail(email) {

    let response = false;

    usuario = email.substring(0, email.indexOf("@"));
    dominio = email.substring(email.indexOf("@")+ 1, email.length);

    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {

        response = true;
    }
    else{
        response = false;
    }

    return response;
}


/**
 * Conta As Integrações Configuradas e as Integrações que foram Enviadas,
 * faz a media e retorna a resposta {TRUE or FALSE} para que seja possivel dar
 * uma resposta ao Cliente!
 *
 * @param respostaIntegracoes
 * @return {boolean}
 */
function validaIntegracoesRealizadas(respostaIntegracoes){

    let integracoesConfiguradas =  Object.keys(respostaIntegracoes).length;
    let integracoesRealizadas = 0;

    Object.keys(respostaIntegracoes).forEach(function(item){

        //console.log(item + " = " + respostaIntegracoes[item]['status'] )

        if(respostaIntegracoes[item]['status'] !== false ){
            integracoesRealizadas += 1;
        }

    });

    //console.log('Integracoes Configuradas = ' + integracoesConfiguradas);
    //console.log('Integracoes Realizadas = ' + integracoesRealizadas);

    if( integracoesRealizadas >= integracoesConfiguradas/2 ){
        return true
    }else{
        return false
    }


}



</script>