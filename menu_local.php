
<?php 
	if ($_SESSION["funcao"] == "administrador") {
?>

<ul>
	<li><a href="administracao.php" > Administração </a> </li>
	<li><a href="lista_amp.php" > Amplificadores </a></li>
	<li><a href="lista_fun.php"> Funcionários </a></li>
	<li><a href="vendas.php" > Vendas </a> </li>
	<li><a href="logout.php" > Sair </a> </li>

</ul>



<?php 
	} else if ($_SESSION["funcao"] == "estoquista") { 
?>
<ul>
	<li><a href="administracao.php" > Administração </a> </li>
	<li><a href="lista_amp.php" > Amplificadores </a> </li>
	<li><a href="vendas.php" > Vendas </a> </li>
	<li><a href="logout.php" > Sair </a> </li>
</ul>
<?php 
	} else {
		
?>
<ul>
	<li><a href="administracao.php" > Administração </a> </li>
	<li><a href="vendas.php" > Vendas </a> </li>
	<li><a href="logout.php" > Sair </a> </li>
</ul>

<?php 
	}
?>