
<?php #<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> ?>
<?php

    if(PHP_OS === 'WINNT'){ $isWindows = true; }else{ $isWindows = false; }

    /** Importa Arquivos que possui o registro das Integrações */
    require 'pacotesIntegracoes/includeIntegracoes.php';


    /** Importa todas as Configurações das integrações Registradas  */
    foreach ($integracoes as $integracao){
        $varName = $integracao . 'Configuracoes';
        $$varName = require 'pacotesIntegracoes/' . $integracao . '/configuracoes/configuracoes.php';
    }


    /** Importa todas os arquivos de integrações Registradas  */
    foreach ($integracoesHead as $integracaoHead){
        if($isWindows){
            $$integracaoHead = require __DIR__.'\\pacotesIntegracoes\\' . $integracaoHead . '\\integracao\integracaoHead.php';
        }else{
            $$integracaoHead = require __DIR__.'/pacotesIntegracoes/' . $integracaoHead . '/integracao/integracaoHead.php';
        }
    }

    ?>




