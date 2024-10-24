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
			<div id="conteudo_especifico" class="centralisar">
				<h1> ALTERAÇÃO DE USUÁRIOS </h1>
				
				<?php 
					#Receber o código enviado pelo link
					$cod = $_GET["codigo"];
					#Pesquisar os dados em função do código recebido acima
					$Sql_pesquisa = "SELECT
									 NOME_FUN,
									 LOGIN_FUN,
									 FUNCAO_FUN,
									 STATUS_FUN,
									 SENHA_FUN,
									 COD_FUN
									FROM 
									funcionarios
									WHERE
									COD_FUN = '$cod'";
				    $resultado_pesquisa = mysqli_query($conectar,$Sql_pesquisa);
				
					#Extrair cada dado pesquisado acima
					$registro = mysqli_fetch_row($resultado_pesquisa);
				?>
				<!-- Exibir os dados no formulário, escondendo o código para que não haja alteração dele -->
				<form action="processa_altera_fun.php" method="POST">
					<input type="hidden" name="codigo" value="<?php echo $cod?>">
					<?php 
					if($registro[2] == "administrador") {
					?>
					<input type="hidden" name="funcao" value="<?php echo $registro[2]?>">
					<p>
					Senha:
					<input type="password" name="senha" value ="<?php echo $registro[4];?>" required>
					</p>
					</form>
					<?php 
					} else {
					?>
					<p>
					Nome:
					<input type="text" name="nome" value="<?php echo $registro[0];?>" required>
					</p>
					<p>
					Função:
					<input type="radio" name="funcao" value ="estoquista"
					<?php
						if ($registro[2] == "estoquista") {
							echo "checked";
						}
					?>> Estoquista
					<input type="radio" name="funcao" value ="vendedor"
					<?php
						if ($registro[2] == "vendedor") {
							echo "checked";
						}
					?>> Vendedor
					</p>
					<p>
						STATUS:
						<select name="status">
							<option value="ATIVO"
								<?php 
								if($registro[3] == "ATIVO"){
									echo "selected";
								}
								?>> ATIVO
							</option>
							<option value="INATIVO"
								<?php 
								if($registro[3] == "INATIVO"){
									echo "selected";
								}
								?>> INATIVO
							</option>
						</select>
					</p>
					<p>
					Login:
					<input type="text" name="login" value ="<?php echo $registro[1];?>" required>
					</p>
					<p>
					Senha:
					<input type="password" name="senha" value ="<?php echo $registro[4];?>" required>
					</p>
					<button class ="btn" type="submit"> Alterar </button>
				</form>	
				<?php } ?>
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