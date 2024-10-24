<?php
	session_start();

	#Conectar com o BD
	#$conectar = mysqli_connect("localhost", "root", "", "161950");
	
	include('conexao.php');

	#Receber os dados do Login e senha
	$login = $_POST["login"];
	$senha = $_POST["senha"];

	#Verificar se no BD o login e senha recebidos existem.

	$sql_consulta = "SELECT login_fun, senha_fun, nome_fun, cod_fun, funcao_fun
		FROM funcionarios
		WHERE
			login_fun = '$login'
		AND
			senha_fun = '$senha'
		AND 
			status_fun = 'ATIVO'";
			
	   #juntando a conexão com o banco para fazer uma consulta.
	   $resultado_consulta = mysqli_query($conectar, $sql_consulta);
		
	   #verificar se retornará alguma tabela com os dados iguais as variáveis.
	   #num_rows serve para ver a quantidade de linhas que retornará da consulta.
	   $linhas = mysqli_num_rows($resultado_consulta);

	   if($linhas == 1){
		   
		   #fetch_row serve para puxar os dados da tabela e armazenar na variável.
		   $dados = mysqli_fetch_row($resultado_consulta);
		   
		   $_SESSION["nome"] = $dados[2];
		   $_SESSION["cod"] = $dados[3];
		   $_SESSION["funcao"] = $dados[4];
		   
		echo "<script>
				location.href = ('administracao.php')
			  </script>";
	   } else {
		echo "
			<script>
				alert ('Login ou senha incorretos! Digite novamente!!')
				location.href = ('index.php')
			</script>";
	   }
?>