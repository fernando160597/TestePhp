<?php
require_once("classes/cidade.php");
echo "<h2>Cidades</h2>";

$func = new Cidade();

$func->getAllCidades();


?>