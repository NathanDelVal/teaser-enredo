<?php
    //echo 'Controller Log';

    $integracaoName = 'log';

    //var_dump($_REQUEST);

    $status =  $_REQUEST['status'] ? 'true' : 'false';


$text = '';
$text .= <<<EOD
<?php

return [
    'status' => $status,
    
];    
EOD;




//var_dump($text);
$filePath = "../configuracoes/configuracoes.php";

$fp = fopen($filePath, "w+");
//var_dump($fp);
fwrite($fp, $text);
fclose($fp);

header("location: ../../../?tab=$integracaoName");
