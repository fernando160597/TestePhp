<?php

require_once('classes/documento.php');
ob_start();
?>

<form>

</form>

<?php
ob_get_clean(); // limpa os dados anteriores
$func = new Documento();
$func->gerarTxt();
?>