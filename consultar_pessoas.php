<?php
require_once("classes/pessoa.php");
echo "<h2>Pessoas</h2>";

$func = new Pessoa();

$func->getAllPessoas();


?>