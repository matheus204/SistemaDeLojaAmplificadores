<?php
	#Conexão com o BD
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
					<p align="right"> 
						Olá <?php include "seguranca.php" ?>  
					</p>
					<p> 
						<?php include "menu_local.php" ?>
					</p>               
				</div>
			</div>
			<div id="conteudo_especifico">
					<h1> ALTERAÇÃO DE AMPLIFICADORES </h1>
				
					<?php 

					#Receber o código enviado pelo link
					$cod = $_GET["codigo"];

					#Pesquisar os dados em função do código recebido acima
					$sql_pesquisa = "SELECT
										cod_amp,
										marca_amp,
										modelo_amp,
										tipo_amp,
										preco_amp,
										foto_amp
									FROM
										amplificadores
									WHERE cod_amp = '$cod'";

					$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);
					
					#Extrair cada dado pesquisado acima
					$registro = mysqli_fetch_row($resultado_pesquisa);
					?>

					<!-- Exibir os dados no formulário, escondendo o código para que não haja alteração dele -->
					<form action="processa_altera_amp.php" method="post" enctype = "multipart/form-data">
						<input type="hidden" name="codigo" value="<?php echo $registro[0]?>">
						<p>
							Marca:
							<input type="text" name="marca" required value="<?php echo $registro[1]?>">
						</p>
						<p>
							Modelo:
							<input type="text" name="modelo" required value="<?php echo $registro[2]?>">
						</p>
						<p>
							Preço: 
							<input type="text" name="preco" required value="<?php echo $registro[4]?>">
						</p>
						<p>	
							Foto atual:
							<img src="<?php echo $registro[5];?>" width = "100" height = "100" alt="foto do amplificador: <?php echo $registro[1];?>">
						</p>
						<p>
							Foto:
							<input type="file" name="foto">
						</p>
						<p>	
							Tipo:
							<select name="tipo">
								<option value="violao"
									<?php 
									if($registro[3] == "violao") {
										echo "selected";
									}?>> Violão
								</option>
								<option value="baixo"
									<?php 
									if($registro[3] == "baixo") {
										echo "selected";
									}?>> Baixo
								</option>
								<option value="guitarra"
									<?php 
									if($registro[3] == "guitarra") {
										echo "selected";
									}?>> Guitarra
								</option>
							</select>
						</p>
						<button class="btn" type="submit">Alterar dados</button>
					</form>
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