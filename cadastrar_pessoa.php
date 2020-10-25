<?php 
require_once('classes/pessoa.php');
require_once('classes/cidade.php')
?>

<form method = "post">
Nome : <input type="text" name="name" required></br></br>
Idade : <input type="number" name="age" required></br></br>
Data de Nascimento : <input type="date" name="date" required></br></br>
<label> Cidade : 
<?php $result = new Cidade();
$result->getCidades();?>
<input type="submit" name="submit" value = "Cadastrar"></br>
<?php 
if(isset($_POST['submit'])){
require_once('classes/pessoa.php');
$teste = new Pessoa();
$nome = $_POST['name'];
$idade = $_POST['age'];
$data = $_POST['date'];
$o = $_POST['hey'];
echo $o;
$teste->insertUser($nome,$idade,$data,$o);} ?>

</form>








