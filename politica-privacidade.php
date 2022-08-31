<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidade</title>

    <style>
        *{
            font-family: "arial";
        }
        body{
            margin: 0;
        }
        ul{
            list-style: none;
        }

        /**
        * POLICY STYLE
        */
        policy .policy_content{
            display: block;
            max-width: 1100px;
            width: 90%;
            border: 1px solid;
            border-top: none;
            padding-bottom: 2rem;
            margin: 0 auto;
        }
        policy .policy_content-title{
            background-color: #007db2ef;
            text-align: center;
            padding: 1rem;
        }
        policy .policy_content-title h1{
            color: #fff;
            margin: 0;
        }
        policy .policy_spacer{
            margin: 5rem;
        }
        policy .policy_content-text,
        policy .policy_content-index,
        policy .policy_content-index--sub{
            padding: 0 1.5rem;
        }
        policy .policy_content-index{
            font-weight: 700;
        }
        policy .policy_content-index--sub{
            font-style: italic;
            margin: 2rem 0;
        }
        policy .policy_content-list{
            padding: .2rem 4rem;
        }
        policy .policy_content-label{
            margin: 0;
        }
        policy .policy_content-list ul{
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    
<?php 

/**
 * INFORMAÇÕES COMERCIAIS
 * 
 * #Indices: 
 *      [Empresa]: É o nome completo da empresa. Busque por: #empresa> 
 *      [informacoes]: São os tópicos referente a recolha de dados. Busque por: #informacoes>
 *      [formulario]: Serão os campos que vão ser recuperados pelo formulário. Busque por: #formulario>
 *      [coleta]: São as formas de coleta de dados. Busque por: #coleta>
 *      [finalidades]: São para quais finalidades os dados serão utilizados. Busque por: #finalidades>
 *      [aceitacao]: São as maneiras de recolhimento de dados por aceitação(um click). Busque por: #aceitacao>
 *      [contato]: Serão os meios de contato com a empresa. Busque por: #contato>
 */

$vars = array(
    'empresa' => 'H M COUTINHO PETROLEO EIRELI',
    'informacoes' => array(
        'Quem deve utilizar nosso site;',
        'Quais dados coletamos e o que fazemos com eles;',
        'Seus direitos em relação aos seus dados pessoais; e',
        'Como entrar em contato conosco.'
    ),
    'formulario' => array(
        'Nome;',
        'E-mail;',
        'DDD + Telefone;',
        'DDD + Celular;',
        'Endereço;'
    ),
    'coleta' => array(
        'Solicitação de contato através do formulário de "Telefone";',
        'Solicitação de contato através do formulário "Contato por E-mail";',
        'Solicitação de contato através do formulário de "Whatsapp";',
        'Solicitação de cadastro através do formulário de "Entre em contato";',
        'Endereço;'

    ),
    'finalidades' => array(
        'Para que o usuário possa receber mais informações sobre um ou mais serviços específicos e também receber novas ofertas.',
        'Para o esclarecimento de alguma dúvida, fazer um elogio ou reclamação.'
    ),
    'aceitacao' => array(
        'Personalizar a experiência do usuário;',
        'Mapear o uso do site;',
        'Analisar a aceitação do conteúdo ofertado.'
    ),
    'contato' => array(
        'E-mail: hmqualidade@hmcoutinho.com.br',
        'CNPJ: 29.302.205/0002-94',
        'Endereço postal: Rua Porto Alegre, n° 351. São Gonçalo / RJ',
        'CEP: 24.456-530'
    ),
    "data" => "00/00/0000"
)


?>


<policy>
    <div class="policy_content">
        <div class="policy_content-column">
            <div class="policy_content-title">
                <h1>POLÍTICA DE PRIVACIDADE</h1>
            </div>
            <div class="policy_spacer"></div>
            <div class="policy_content-text">
                <p>Este site é mantido e operado por <?= $vars['empresa']; // #empresa> ?>.</p>
            </div>
            <div class="policy_content-text">
                <p>Nós coletamos e utilizamos alguns dados pessoais que pertencem àqueles que utilizam nosso site. Ao fazê-lo, agimos na qualidade de controlador desses dados e estamos sujeitos às disposições da Lei Federal n. 13.709/2018 (Lei Geral de Proteção de Dados Pessoais - LGPD).</p>
            </div>
            <div class="policy_content-text">
                <p>Nós cuidamos da proteção de seus dados pessoais e, por isso, disponibilizamos esta política de privacidade, que contém informações importantes sobre:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <?php foreach($vars['informacoes'] as $index => $value):  // #informacoes> ?>
                    <li>- <?= $value ?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="policy_content-index">
                <p>1. Dados que coletamos e motivos da coleta</p>
            </div>
            <div class="policy_content-text">
                <p>Nosso site coleta e utiliza alguns dados pessoais de nossos usuários, de acordo com o disposto nesta seção.</p>
            </div>
            <div class="policy_content-index--sub">
                <p>1. Dados pessoais fornecidos expressamente pelo usuário</p>
            </div>
            <div class="policy_content-text">
                <p>Nós coletamos os seguintes dados pessoais que nossos usuários nos fornecem expressamente ao utilizar nosso site:</p>
            </div>
            <div class="policy_content-list">
                <div class="policy_content-label">
                    <p>Formulários de Contato do Site:</p>
                </div>
                <ul>
                <?php foreach($vars['formulario'] as $index => $value):  // #formulario> ?>
                    <li>- <?= $value ?></li>
                <?php endforeach;?>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>A coleta destes dados ocorre nos seguintes momentos: </p>
            </div>
            <div class="policy_content-list">
                <ul>
                <?php foreach($vars['coleta'] as $index => $value):  // #coleta> ?>
                    <li>- <?= $value ?></li>
                <?php endforeach;?>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>Os dados fornecidos por nossos usuários são coletados com as seguintes finalidades:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <?php foreach($vars['finalidades'] as $index => $value):  // #finalidades> ?>
                        <li>- <?= $value ?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="policy_content-index--sub">
                <p>2. Dados pessoais obtidos de outras formas</p>
            </div>
            <div class="policy_content-text">
                <p>Nós coletamos os seguintes dados pessoais de nossos usuários:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li>- Endereço IP</li>
                    <li>- Dados de Geolocalização</li>
                    <li>- Histórico de navegação e fluxo de acesso ao site.</li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>A coleta destes dados ocorre nos seguintes momentos:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li>- Ao acessar o site e aceitar os Cookies;</li>
                    <li>- Ao navegar nas páginas do site;</li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>Estes dados são coletados com as seguintes finalidades:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <?php foreach($vars['aceitacao'] as $index => $value):  // #aceitacao> ?>
                        <li>- <?= $value ?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="policy_content-index--sub">
                <p>3. Dados sensíveis</p>
            </div>
            <div class="policy_content-text">
                <p><strong>Não</strong> serão coletados dados sensíveis de nossos usuários, assim entendidos aqueles definidos nos arts. 11 e seguintes da Lei de Proteção de Dados Pessoais. Assim, <strong>não</strong> haverá coleta de dados sobre origem racial ou étnica, convicção religiosa, opinião política, filiação a sindicato ou a organização de caráter religioso, filosófico ou político, dado referente à saúde ou à vida sexual, dado genético ou biométrico, quando vinculado a uma pessoa natural.</p>
            </div>
            <div class="policy_content-index--sub">
                <p>4. Cookies</p>
            </div>
            <div class="policy_content-text">
                <p>Cookies são pequenos arquivos de texto baixados automaticamente em seu dispositivo quando você acessa e navega por um site. Eles servem, basicamente, para que seja possível identificar dispositivos, atividades e preferências de usuários.</p>
            </div>
            <div class="policy_content-text">
                <p>Os cookies não permitem que qualquer arquivo ou informação sejam extraídos do disco rígido do usuário, não sendo possível, ainda, que, por meio deles, se tenha acesso a informações pessoais que não tenham partido do usuário ou da forma como utiliza os recursos do site.</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li><i>a. Cookies do site</i></li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>Os cookies do site são aqueles enviados ao computador ou dispositivo do usuário e administrador exclusivamente pelo site.</p>
            </div>
            <div class="policy_content-text">
                <p>As informações coletadas por meio destes cookies são utilizadas para melhorar e personalizar a experiência do usuário, sendo que alguns cookies podem, por exemplo, ser utilizados para lembrar as preferências e escolhas do usuário, bem como para o oferecimento de conteúdo personalizado.</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li><i>b. Cookies de terceiros</i></li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>Alguns de nossos parceiros podem configurar cookies nos dispositivos dos usuários que acessam nosso site.</p>
            </div>
            <div class="policy_content-text">
                <p>Estes cookies, em geral, visam possibilitar que nossos parceiros possam oferecer seu conteúdo e seus serviços ao usuário que acessa nosso site de forma personalizada, por meio da obtenção de dados de navegação extraídos a partir de sua interação com o site.</p>
            </div>
            <div class="policy_content-text">
                <p>O usuário poderá obter mais informações sobre os cookies de terceiro e sobre a forma como os dados obtidos a partir dele são tratados, além de ter acesso à descrição dos cookies utilizados e de suas características, acessando o seguinte link:</p>
            </div>
            <div class="policy_content-list">
                <ul style="word-break: break-all;">
                    <li>- Google Ads e Analytics:
                    https://static.googleusercontent.com/media/www.google.com/pt-BR//intl/pt-BR/policies/privacy/google_privacy_policy_pt-BR.pdf	 </li>
                    <li>- Facebook: https://www.facebook.com/policy.php</li>
                    <li>- Instagram: https://www.instagram.com/terms/accept/?hl=pt-br
                        https://www.facebook.com/help/instagram/519522125107875</li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>As entidades encarregadas da coleta dos cookies poderão ceder as informações obtidas a terceiros.</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li><i>c. Gestão de cookies</i></li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>O usuário poderá se opor à utilização de cookies pelo site, bastando que os desative no momento em que começa a utilizar o serviço, seguindo as seguintes instruções:</p>
            </div>
            <div class="policy_content-text indent-left">
                <p>Assim que entrar no site, o usuário terá a opção de "Aceitar" ou "Não Aceitar" a utilização de cookies, bastando que selecione a opção correspondente na caixa de diálogo (pop up) carregada automaticamente assim que nossa página é acessada.</p>
            </div>
            <div class="policy_content-text">
                <p>A desativação de todos os cookies, no entanto, não será possível, uma vez que alguns deles são essenciais para que o site funcione corretamente.</p>
            </div>
            <div class="policy_content-text">
                <p>Além disso, a desativação dos cookies que podem ser desabilitados poderá prejudicar a experiência do usuário, uma vez que informações utilizadas para personalizá-la deixarão de ser utilizadas.</p>
            </div>
            <div class="policy_content-index--sub">
                <p>5. Coleta de dados não previstos expressamente</p>
            </div>
            <div class="policy_content-text">
                <p>Eventualmente, outros tipos de dados não previstos expressamente nesta Política de Privacidade poderão ser coletados, desde que sejam fornecidos com o consentimento do usuário, ou, ainda, que a coleta seja permitida com fundamento em outra base legal prevista em lei.</p>
            </div>
            <div class="policy_content-text">
                <p>Em qualquer caso, a coleta de dados e as atividades de tratamento dela decorrentes serão informadas aos usuários do site.</p>
            </div>
            <div class="policy_content-index">
                <p>2. Compartilhamento de dados pessoais com terceiros</p>
            </div>
            <div class="policy_content-text">
                <p>Nós não compartilhamos seus dados pessoais com terceiros. Apesar disso, é possível que o façamos para cumprir alguma determinação legal ou regulatória, ou, ainda, para cumprir alguma ordem expedida por autoridade pública.</p>
            </div>
            <div class="policy_content-index">
                <p>3. Por quanto tempo seus dados pessoais serão armazenados</p>
            </div>
            <div class="policy_content-text">
                <p>Os dados pessoais que coletamos serão armazenados e utilizados pelos seguintes períodos de tempo:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li>- Os dados coletados em formulários, permanecerão armazenados sob nossos cuidados e em segurança até o momento que o usuário solicitar ou o mesmo fazer a remoção, pois entenderemos que, enquanto não solicitar a sua remoção, o mesmo ainda terá o interesse de receber mais informações sobre serviços e produtos, para os quais ele solicitou e outros que julgamos como fazer parte de seu interesse.</li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>Os períodos informados não são superiores ao estritamente necessário, atendendo às finalidades e às justificativas legais para o tratamento dos dados.</p>
            </div>
            <div class="policy_content-text">
                <p>Vale dizer que, se houver alguma justificativa legal ou regulatória, os dados poderão continuar armazenados ainda que a finalidade para a qual foram coletados ou tenham sido tratados tenha se exaurido.</p>
            </div>
            <div class="policy_content-text">
                <p>Uma vez finalizado o tratamento, observadas as disposições desta seção, os dados são apagados ou anonimizados.</p>
            </div>
            <div class="policy_content-index">
                <p>4. Bases legais para o tratamento de dados pessoais</p>
            </div>
            <div class="policy_content-text">
                <p>Uma base legal para o tratamento de dados pessoais nada mais é que um fundamento jurídico, previsto em lei, que o justifica. Assim, cada operação de tratamento de dados pessoais precisa ter uma base legal a ela correspondente.</p>
            </div>
            <div class="policy_content-text">
                <p>Nós tratamos os dados pessoais de nossos usuários nas seguintes hipóteses:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li>- mediante o consentimento do titular dos dados pessoais</li>
                    <li>- quando necessário para atender aos interesses legítimos do controlador ou de terceiro</li>
                </ul>
            </div>
            <div class="policy_content-index--sub">
                <p>1. Consentimento</p>
            </div>
            <div class="policy_content-text">
                <p>Determinadas operações de tratamento de dados pessoais realizadas em nosso site dependerão da prévia concordância do usuário, que deverá manifestá-la de forma livre, informada e inequívoca.</p>
            </div>
            <div class="policy_content-text">
                <p>O usuário poderá revogar seu consentimento a qualquer momento, sendo que, não havendo hipótese legal que permita ou que demande o armazenamento dos dados, os dados fornecidos mediante consentimento serão excluídos.</p>
            </div>
            <div class="policy_content-text">
                <p>Além disso, se desejar, o usuário poderá não concordar com alguma operação de tratamento de dados pessoais baseada no consentimento. Nestes casos, porém, é possível que não possa utilizar alguma funcionalidade do site que dependa daquela operação. As consequências da falta de consentimento para uma atividade específica são informadas previamente ao tratamento.</p>
            </div>
            <div class="policy_content-index--sub">
                <p>2. Legítimo interesse</p>
            </div>
            <div class="policy_content-text">
                <p>Para determinadas operações de tratamento de dados pessoais, nos baseamos exclusivamente em nosso interesse legítimo. Para saber mais sobre em quais casos, especificamente, nos valemos desta base legal, ou para obter mais informações sobre os testes que fazemos para termos certeza de que podemos utilizá-la, entre em contato com nosso Encarregado de Proteção de Dados Pessoais por algum dos canais informados nesta Política de Privacidade, na seção "Como entrar em contato conosco".</p>
            </div>
            <div class="policy_content-index">
                <p>5. Direitos do usuário</p>
            </div>
            <div class="policy_content-text">
                <p>O usuário do site possui os seguintes direitos, conferidos pela Lei de Proteção de Dados Pessoais:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li>- confirmação da existência de tratamento;</li>
                    <li>- acesso aos dados;</li>
                    <li>- correção de dados incompletos, inexatos ou desatualizados;</li>
                    <li>- anonimização, bloqueio ou eliminação de dados desnecessários, excessivos ou tratados em desconformidade com o disposto na lei;</li>
                    <li>- portabilidade dos dados a outro fornecedor de serviço ou produto, mediante requisição expressa, de acordo com a regulamentação da autoridade nacional, observados os segredos comercial e industrial;</li>
                    <li>- eliminação dos dados pessoais tratados com o consentimento do titular, exceto nos casos previstos em lei;	 </li>
                    <li>- informação das entidades públicas e privadas com as quais o controlador realizou uso compartilhado de dados;	 </li>
                    <li>- informação sobre a possibilidade de não fornecer consentimento e sobre as consequências da negativa;	 </li>
                    <li>- revogação do consentimento.</li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>É importante destacar que, nos termos da LGPD, não existe um direito de eliminação de dados tratados com fundamento em bases legais distintas do consentimento, a menos que os dados sejam desnecessários, excessivos ou tratados em desconformidade com o previsto na lei.</p>
            </div>
            <div class="policy_content-index--sub">
                <p>1. Como o titular pode exercer seus direitos</p>
            </div>
            <div class="policy_content-text">
                <p>Os titulares de dados pessoais tratados por nós poderão exercer seus direitos por meio de pedido de acesso aos dados através do e-mail hmqualidade@hmcoutinho.com.br Alternativamente, se desejar, o titular poderá enviar um e-mail ou uma correspondência ao nosso Encarregado de Proteção de Dados Pessoais. As informações necessárias para isso estão na seção "Como entrar em contato conosco" desta Política de Privacidade.</p>
            </div>
            <div class="policy_content-text">
                <p>Os titulares de dados pessoais tratados por nós poderão exercer seus direitos a partir do envio de mensagem ao nosso Encarregado de Proteção de Dados Pessoais, seja por e-mail ou por correspondência. As informações necessárias para isso estão na seção "Como entrar em contato conosco" desta Política de Privacidade.</p>
            </div>
            <div class="policy_content-text">
                <p>Para garantir que o usuário que pretende exercer seus direitos é, de fato, o titular dos dados pessoais objeto da requisição, poderemos solicitar documentos ou outras informações que possam auxiliar em sua correta identificação, a fim de resguardar nossos direitos e os direitos de terceiros. Isto somente será feito, porém, se for absolutamente necessário, e o requerente receberá todas as informações relacionadas.</p>
            </div>
            <div class="policy_content-index">
                <p>6. Medidas de segurança no tratamento de dados pessoais</p>
            </div>
            <div class="policy_content-text">
                <p>Empregamos medidas técnicas e organizativas aptas a proteger os dados pessoais de acessos não autorizados e de situações de destruição, perda, extravio ou alteração desses dados.</p>
            </div>
            <div class="policy_content-text">
                <p>As medidas que utilizamos levam em consideração a natureza dos dados, o contexto e a finalidade do tratamento, os riscos que uma eventual violação geraria para os direitos e liberdades do usuário, e os padrões atualmente empregados no mercado por empresas semelhantes à nossa.</p>
            </div>
            <div class="policy_content-text">
                <p>Entre as medidas de segurança adotadas por nós, destacamos as seguintes:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                    <li>- Armazenamento de senhas utilizando hashes criptográficos;</li>
                    <li>- restrições de acessos a bancos de dados; </li>
                    <li>- monitoramento de acesso físicos a servidores;</li>
                    <li>- Segurança de ataques de acordo com as políticas da Amazon Aws.</li>
                </ul>
            </div>
            <div class="policy_content-text">
                <p>Ainda que adote tudo o que está ao seu alcance para evitar incidentes de segurança, é possível que ocorra algum problema motivado exclusivamente por um terceiro - como em caso de ataques de hackers ou crackers ou, ainda, em caso de culpa exclusiva do usuário, que ocorre, por exemplo, quando ele mesmo transfere seus dados a terceiro. Assim, embora sejamos, em geral, responsáveis pelos dados pessoais que tratamos, nos eximimos de responsabilidade caso ocorra uma situação excepcional como essas, sobre as quais não temos nenhum tipo de controle.</p>
            </div>
            <div class="policy_content-text">
                <p>De qualquer forma, caso ocorra qualquer tipo de incidente de segurança que possa gerar risco ou dano relevante para qualquer de nossos usuários, comunicaremos os afetados e a Autoridade Nacional de Proteção de Dados acerca do ocorrido, em conformidade com o disposto na Lei Geral de Proteção de Dados.</p>
            </div>
            <div class="policy_content-index">
                <p>7. Reclamação a uma autoridade de controle</p>
            </div>
            <div class="policy_content-text">
                <p>Sem prejuízo de qualquer outra via de recurso administrativo ou judicial, os titulares de dados pessoais que se sentirem, de qualquer forma, lesados, podem apresentar reclamação à Autoridade Nacional de Proteção de Dados.</p>
            </div>
            <div class="policy_content-index">
                <p>8. Alterações nesta política</p>
            </div>
            <div class="policy_content-text">
                <p>A presente versão desta Política de Privacidade foi atualizada pela última vez em: <?= $vars['data'] ?>.</p>
            </div>
            <div class="policy_content-text">
                <p>Nos reservamos o direito de modificar, a qualquer momento, as presentes normas, especialmente para adaptá-las às eventuais alterações feitas em nosso site, seja pela disponibilização de novas funcionalidades, seja pela supressão ou modificação daquelas já existentes.</p>
            </div>
            <div class="policy_content-text">
                <p>Sempre que houver uma modificação, nossos usuários serão notificados acerca da mudança.</p>
            </div>
            <div class="policy_content-index">
                <p>9. Como entrar em contato conosco</p>
            </div>
            <div class="policy_content-text">
                <p>Para esclarecer quaisquer dúvidas sobre esta Política de Privacidade ou sobre os dados pessoais que tratamos, entre em contato com nosso Encarregado de Proteção de Dados Pessoais, por algum dos canais mencionados abaixo:</p>
            </div>
            <div class="policy_content-list">
                <ul>
                <?php foreach($vars['contato'] as $index => $value):  // #contato> ?>
                    <li>- <?= $value ?></li>
                <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>

</policy>


</body>
</html>