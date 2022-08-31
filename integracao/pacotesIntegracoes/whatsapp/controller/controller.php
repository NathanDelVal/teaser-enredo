<?php

$integracaoName = 'whatsapp';
$filePath = "../configuracoes/configuracoes.php";
$forms = include_once '../../form/configuracoes/configuracoes.php';
include_once '../../../aplicaIntegracoes/auxiliares/funcoesAuxiliaresIntegracoes.php';

$optionsDefault = [
    'status',
    'formulario',
    'numero',
    'texto',
];

$optionsForms = [
];

$textForms = createFormOptions($_REQUEST, $optionsDefault, $optionsForms , $forms);

$text = <<<EOD
<?php

return [
    $textForms
];    
EOD;

$fp = fopen($filePath, "w+");
fwrite($fp, $text);
fclose($fp);

header("location: ../../../?tab=$integracaoName");


