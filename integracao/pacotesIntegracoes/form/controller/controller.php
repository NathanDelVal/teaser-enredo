<?php

$formularios = [];

for ($i=0; $i<=50; $i++){

    $formularios[] = $_REQUEST['formulario-'.$i];

}
//var_dump($formularios);


$forms = '';

foreach ($formularios as $formulario){

    if($formulario != ''){

        $forms .= <<<EOD

    '$formulario',
EOD;

    }

}


$file = <<<EOD
<?php

return [
    $forms
];
EOD;



$filePath = "../configuracoes/configuracoes.php";


$fp = fopen($filePath, "w+");
fwrite($fp, $file);
fclose($fp);


header("location: ../../../?tab=form");
