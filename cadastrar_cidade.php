<?php
require_once('classes/cidade.php')
?>

<form method="post">
    Nome : <input type="text" name="Cidade" required></br></br>
        <input type="submit" name="submit" value="Cadastrar"></br>
        <?php
        if (isset($_POST['submit'])) {
            $function = new Cidade();
            $cidade = $_POST['Cidade'];
            $function->insereCidade($cidade);
        } ?>

</form>