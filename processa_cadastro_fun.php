<?php
	#Conexão com o BD e sessão iniciada.
	session_start();
	include('conexao.php');
	
	#Receber os dados do formulário e armazenar em variáveis.
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$funcao = $_POST["funcao"];
	
	#Verificar se existe um login igual.
	$sql_consulta = "SELECT login_fun from funcionarios
					Where login_fun = '$login'";
	
	$resultado_consulta = mysqli_query($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows($resultado_consulta);
	
	if($linhas == 1){
		echo "<script> 
				alert('$nome já cadastrado. Tente outro!!')
			  </script>";
			  
		echo "<script> 
				location.href = ('cadastra_fun.php')
			  </script>";
			  
	} else {
		$sql_cadastrar = "Insert into funcionarios 
									  (nome_fun, funcao_fun, login_fun, senha_fun)
						  VALUES ('$nome', '$funcao', '$login', '$senha')";
		
		$resultado_cadastrar = mysqli_query($conectar, $sql_cadastrar);
		
		if($resultado_cadastrar == true){
			echo "<script>
					alert('$nome cadastrado com sucesso!')
				  </script>";
			echo "<script>
					location.href = ('cadastra_fun.php')
				 </script>";
		} else {
			echo "<script>
					alert('$nome já cadastrado!! Tente novamente!!);
				</script>";
			
			echo "<script>
					location.href = ('cadastra_fun.php')
				 </script>";
		}
	}
 ?>