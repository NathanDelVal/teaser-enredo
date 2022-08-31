<?php

$logConfiguracoes = require_once '../configuracoes/configuracoes.php';
include_once '../../includeIntegracoes.php';

if( $logConfiguracoes['status'] ):

    $formularioDados = $_REQUEST['formularioDados'];
    $respostaIntegracoes = $_REQUEST['respostaIntegracoes'];


    /** Criação do Cabeçalho */
    $cabecalho = [
        'Data',
        'Fomulario Preenchido',
        'Nome',
    ];

    /** Criação dos dados do Formulario */
    $nome = explode(" ", $formularioDados['nome']);
    $dados = [
        'data' => date('d/m/Y H:i'),
        'formNome' => $formularioDados['formNome'],
        'nome' => $nome[0],
    ];


    /** Criação das Resposta das Integrações */
    foreach ($integracoes as $integracao){
        if($integracao == 'form' || $integracao == 'log' || $integracao == 'whatsapp'){ continue; }

        $cabecalho[] = $integracao.' Integração';


        $status = $respostaIntegracoes[$integracao.'Resposta']['status'];
        $resposta = $respostaIntegracoes[$integracao.'Resposta']['mensagem'];


        if($status != '' && $resposta != ''){
            $mensagem = 'Status: '.$status.' && Mensagem: '.$resposta;
        }else{
            $mensagem = 'Não Configurado!';
        }

        $dados = array_merge($dados, [ $integracao.'Reposta' =>  $mensagem ] );

    }

    $a = [ $dados ];



    $nomeArquivo = 'log.csv';

    $arquivo = fopen($nomeArquivo, 'a+');

    if(!fread( $arquivo, filesize($nomeArquivo) )){
        fputcsv($arquivo, $cabecalho);
    }

    foreach ([ $dados ] as $linha) {
        //var_dump($linha);
        fputcsv($arquivo, $linha);
    }

    fclose($arquivo);

endif;

