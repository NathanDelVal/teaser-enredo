<?php

//require 'integracao/frontTratamento/modalResposta.php';

if($isWindows) {
    require __DIR__.'\\device.php';
    require __DIR__.'\\funcoesAuxiliares.php';
}else{
    require 'device.php';
    require 'funcoesAuxiliares.php';
}

?>

<!-- <script src="integracao/frontTratamento/processaForm.js"></script> -->
<script>
    // parâmetros para novocrm
    // as variáveis $device e $parameters são definidas em index.php
    const dispositivo = "<?= detect_mobile(); ?>";
    const parametrosUrl = "<?= $_SERVER['QUERY_STRING'] ?>";
</script>



