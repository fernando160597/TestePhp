<?php
require_once("classes/cidade.php");

?>


<form  method="post">
Nome: <input type="text" name="Nome" required><br>
<br>
<input type="submit" name = "submit" value = "Cadastrar"><br>
</form>

<?php
if(isset($_POST["submit"]))
{

    $func = new Cidade();
    $func->insereCidade($_POST['Nome']);
}
?>


