<?php
$integracaoName = 'log';
include_once '../../includeIntegracoes.php';

$cabecalho = [
    'Data',
    'Fomulario Preenchido',
    'Nome',
];

foreach ($integracoes as $integracao) {
    if ($integracao == 'form' || $integracao == 'log' || $integracao == 'whatsapp') { continue; }

    $cabecalho[] = $integracao . ' Integração';

}

$nomeArquivo = 'log.csv';

$arquivo = fopen($nomeArquivo, 'w');

fputcsv($arquivo, $cabecalho);


fclose($arquivo);

header("location: ../../../?tab=$integracaoName");
