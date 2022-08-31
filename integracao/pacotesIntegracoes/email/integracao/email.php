<?php
header('Content-Type: application/json');

require '../../../../vendor/autoload.php';

$emailConfiguracoes = require_once '../configuracoes/configuracoes.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$formId = $_REQUEST['formId'];
$formNome = $_REQUEST['formNome'];
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefoneCompleto = $_REQUEST['telefoneCompleto'];
$telefoneSemDDD = $_REQUEST['telefoneSemDDD'];
$ddd = $_REQUEST['ddd'];
$empresa = $_REQUEST['empresa'];
$mensagem = $_REQUEST['mensagem'];
$termos = $_REQUEST['termos'];

$resposta = [
    'status' => false,
    'emailEnviados' => '',
];

if( $emailConfiguracoes['geral']['status'] !== true || $emailConfiguracoes[$formNome]['status'] !== true ){
    echo json_encode($resposta);
    return 0;
}

$emailsEnviar = array_merge($emailConfiguracoes['geral']['sendTo'], $emailConfiguracoes[$formNome]['sendTo']);

if( !empty($nome) && !empty($email) && !empty($telefoneSemDDD) && !empty($emailsEnviar) ):

    foreach ($emailsEnviar as $emailSend):

        /** Configurações Gerais */
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Encoding = 'base64';

        /** Configurações SMTP */
        $mail->Host = $emailConfiguracoes['geral']['Host'];
        $mail->SMTPAuth = true;
        $mail->Username = $emailConfiguracoes['geral']['Username'];
        $mail->Password = $emailConfiguracoes['geral']['Password'];
        $mail->Port = $emailConfiguracoes['geral']['Port'];

        if($emailConfiguracoes['geral']['SMTPSecure'] == 'desativar'){
            $mail->SMTPAutoTLS = False;
        }else{
            $mail->SMTPSecure = $emailConfiguracoes['geral']['SMTPSecure'];
        }

        if($emailConfiguracoes['geral']['debug']){
            $mail->SMTPDebug = 2;
        }

        /** Enviado Por */
        $mail->setFrom($emailConfiguracoes['geral']['FromEmail'], $emailConfiguracoes['geral']['FromName']);

        /** Responder a */
        //$mail->addReplyTo('empresa@email.com.br', 'Empresa Nome');

        /** Enviar Para */
        $mail->addAddress($emailSend);

        /** Assunto */
        $mail->Subject = 'Contato - '.$emailConfiguracoes['geral']['FromName'];

        /** Corpo Do Email */
        $bodyContent = "<h1>Contato Realizado - ".$emailConfiguracoes['geral']['FromName']."</h1>";
        $bodyContent .= '<p>';
        $bodyContent .= '<br><b>Nome:</b> ' . $nome;
        $bodyContent .= '<br><b>Email:</b> ' . $email;
        $bodyContent .= '<br><b>Telefone:</b> ' . $ddd . ' ' . $telefoneSemDDD;
        if( $mensagem != 'undefined' && $mensagem !== "" && $mensagem != null ){
            $bodyContent .= '<br><b>Mensagem:</b> ' . $mensagem;
        }
        $bodyContent .= '<br><b>Data:</b> ' . date('d/m/Y');
        $bodyContent .= '<br><b>Hora:</b> ' . date('H:i');
        $bodyContent .= '<br><b>Formulário Preenchido:</b> ' . $formNome;
        $bodyContent .= '</p>';

        /** Seta Corpo do Email */
        $mail->Body = $bodyContent;

        /** Envia Email */
        if($mail->send()) {
            $resposta['emailEnviados'] .= $emailSend . ',';
        }

    endforeach;

    if($resposta['emailEnviados'] != ''){

        echo json_encode([
            'status' => true,
            'emailEnviados' => $resposta['emailEnviados'],
        ]);

    }else{

        echo json_encode([
            'status' => false,
            'emailEnviados' => $resposta['emailEnviados'],
        ]);

    }

else:

    echo json_encode([
        'status' => false,
        'emailEnviados' => $resposta['emailEnviados'],
        'mensagem' => 'Campos Invalidos'
    ]);

endif;