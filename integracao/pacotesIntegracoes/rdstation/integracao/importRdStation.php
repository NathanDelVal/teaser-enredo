<?php
  // indica se o script do rd station deve ser importado ou não. 
  // Mude o valor conforme necessário.
  $shouldImportRd = false;

  // url remota do script do rd station
  $rdStationSrc = '';
?>

<?php if ($shouldImportRd): ?>

<!-- script remoto da RD Station -->
<script type="text/javascript" async src="<?= $rdStationSrc ?>"></script>

<? endif; ?>