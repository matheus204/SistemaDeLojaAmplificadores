<?php 
	session_start();
	include  ('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
					<h1> ROCK N' ROLL </h1>
					<h1> Amplificadores </h1>
				</div>
				<div id="menu_global"  class="menu_global">
				<p id="menu_nome" align="right"> 
						Olá <?php include "seguranca.php" ?>  
					</p>
					<p> 
						<?php include "menu_local.php" ?>
					</p> 
					               
				</div>
			</div>
			<div id="conteudo_especifico">
				<h1> EXIBIÇÃO DE AMPLIFICADORES </h1>							

				<?php 
					$codigo_amp = $_GET["codigo"];

					$Sql_pesquisa = "SELECT
									 MARCA_AMP,
									 TIPO_AMP,
									 COD_AMP,
									 preco_amp,
									 FOTO_AMP,
									 modelo_amp
									FROM 
									amplificadores
									WHERE
									COD_AMP = '$codigo_amp'";
				
				$tabela_resultado = mysqli_query($conectar, $Sql_pesquisa);

				$registro = mysqli_fetch_row($tabela_resultado); ?>
				
				<p> 
					<img src="<?php echo $registro[4];?>" width = "200" height = "200" alt="foto do amplificador: <?php echo $registro[5];?>">
				</p>
				<?php
				echo "<p> Marca: $registro[0]</p>";
				echo "<p> Modelo: $registro[5]</p>";
				echo "<p> Tipo: $registro[1]</p>";
				echo "<p> Preço: $registro[3]</p>";
				?>


				
			</div>	
				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
		</div>
    </body>
</html>