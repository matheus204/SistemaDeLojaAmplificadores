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
		<style>
			
			th {
				color: red;
			}
			td {
				color: white;
			}
			h3#alterar{
				color: yellow;
			}
		</style>
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
					<h1> ROCK N' ROLL </h1>
					<h1> Amplificadores </h1>
				</div>
				<div id="menu_global"  class="menu_global">
					<p align="right"> 
						Olá <?php include "seguranca.php" ?>  
					</p>
					<p> 
						<?php include "menu_local.php" ?>
					</p> 
					            
				</div>
			</div>
			<div id="conteudo_especifico" class="conteudo_especifico">
				<h1> AMPLIFICADORES </h1>
				<p align="right">
					<a href="cadastra_amp.php">
						<h4 align="right"> Cadastrar novo amplificador </h4>
					</a>				
				</p>
				<?php
					$conectar = mysqli_connect("localhost", "root", "", "161950");
					$sql_pesquisa = "SELECT
									marca_amp, modelo_amp, preco_amp, tipo_amp, cod_amp
									from amplificadores";
					$sql_resultado = mysqli_query($conectar, $sql_pesquisa);
				?>
				<table border = "1" width="100%"> 
					<tr height="50px">
						
						<th>
							MARCA
						</th>
						<th>
							MODELO
						</th>
						<th>
							PREÇO
						</th>
						<th>
							TIPO
						</th>
						<th>
							AÇÃO
						</th>
					</tr>
					
					<?php 
					while ($registro = mysqli_fetch_row($sql_resultado)) {
				?> 
					<tr height="50px">
						
						<td>
							<?php echo $registro[0];?>
						</td>
						<td>
							<a class="linkRegistro" href="exibe_amp.php?codigo=<?php echo $registro[4];?>">
								<?php echo $registro[1];?>
							</a>
						</td>
						<td>
							<?php echo $registro[2];?> 
						</td>
						<td> 
							<?php echo $registro[3];?>
						</td>
						<td>
							<a href="altera_amp.php?codigo=<?php echo $registro[4];?>"> Alterar
						</td>
					</tr>

					<?php 
					} 
					?>
					
				</table>
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 96 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
				
		</div>
    </body>
</html>