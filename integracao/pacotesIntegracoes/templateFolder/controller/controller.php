<?php
$integracaoName = '';

var_dump($_REQUEST);

$status = $_REQUEST['status'] ? 'true' : 'false';
$id = $_REQUEST['id'];


$text = '';
$text .= <<<EOD
<?php

return [
    'status' => $status,
    'id' => '$id',
];    
EOD;


//var_dump($text);
$filePath = "../configuracoes/configuracoes.php";

$fp = fopen($filePath, "w+");
//var_dump($fp);
//fwrite($fp, $text);
fclose($fp);

//header("location: ../../../?tab=$integracaoName");
