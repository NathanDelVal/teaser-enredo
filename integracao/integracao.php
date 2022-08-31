<?php

    $dirBase = explode('landing-page-wp', __DIR__);
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    if( strpos($link, '?') ){
        $link = explode('?', $link);
        $link = $link[0];
    }
    $link = rtrim($link,'/');

    if(!empty($dirBase[1])){
        $urlIntegracao = $link.$dirBase[1];
    }else{
        $urlIntegracao = $link;
    }


    if(!strpos($urlIntegracao, 'integracao')){ $urlIntegracao .= '/integracao'; }
    //echo $urlIntegracao;
   
    if(PHP_OS === 'WINNT'){ $isWindows = true; }else{ $isWindows = false; }

    /** Importa Arquivos que auxiliam nas integrações */
    require 'aplicaIntegracoes/auxiliares/includeAuxiliares.php';

    require "frontTratamento/frontIncludes.php";


    /** Importa Arquivos que possui o registro das Integrações */
    require 'pacotesIntegracoes/includeIntegracoes.php';


    /** Arquivo a ser incluido dentro da landPage Padrãp */
    //var_dump($integracoes);

    /* Importa todas as Configurações das integrações Registradas */
    foreach ($integracoes as $integracao){
        $varName = $integracao . 'Configuracoes';
        $$varName = require 'pacotesIntegracoes/' . $integracao . '/configuracoes/configuracoes.php';
    }


    /** Importa todas os arquivos de integrações Registradas  */
    foreach ($integracoes as $integracao){
        if( $integracao === 'form' ){ continue; }
        if($isWindows) {
            $$integracao = require __DIR__.'\\pacotesIntegracoes\\' . $integracao . '\\integracao\integracao.php';
        }else{
            $$integracao = require __DIR__.'/pacotesIntegracoes/' . $integracao . '/integracao/integracao.php';
        }
    }


    //require 'integracao/aplicaIntegracoes/processa.php';
    if($isWindows) {
        require __DIR__.'\\aplicaIntegracoes\aplicaIntegracao.php';
    }else{
        require __DIR__.'/aplicaIntegracoes/aplicaIntegracao.php';
    }


?>