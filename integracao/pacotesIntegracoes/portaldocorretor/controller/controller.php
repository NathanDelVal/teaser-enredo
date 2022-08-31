<?php

$integracaoName = 'portaldocorretor';
$filePath = "../configuracoes/configuracoes.php";
$forms = include_once '../../form/configuracoes/configuracoes.php';
include_once '../../../aplicaIntegracoes/auxiliares/funcoesAuxiliaresIntegracoes.php';

//var_dump($forms);
//var_dump($_REQUEST);

$optionsDefault = [
    'status',
    'token',
    'url',
];

$optionsForms = [
    'status',
    'group',
];

$textForms = createFormOptions($_REQUEST, $optionsDefault, $optionsForms , $forms);


$text = <<<EOD
<?php

return [
    $textForms
];    
EOD;

//var_dump($text);

$fp = fopen($filePath, "w+");
//var_dump($fp);
fwrite($fp, $text);
fclose($fp);


header("location: ../../../?tab=$integracaoName");


