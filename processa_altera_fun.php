<?php 
session_start();
include ("conexao.php");

$codigo = $_POST["codigo"];
$funcao = $_POST["funcao"];

if($funcao == "administrador"){
    $senha = $_POST["senha"];
    $sql_altera = "UPDATE funcionarios
                    SET senha_fun = '$senha'
                    WHERE cod_fun = '$codigo'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
    if ($sql_resultado_alteracao == true){
        echo "<script> 
                alert ('Senha do admininastor alterada com sucesso!')
              </script>";
        echo "<script>
                location.href = ('lista_fun.php') 
             </script>";
             exit();      
    }
    else
    {
        echo "<script>
                alert ('Ocorreu um erro no servidor. A senha do administrador não foi alterada.
                        Tente novamente!!')
             </script>";
    
        echo "<script> location.href = ('altera_fun.php?codigo=$codigo') </script>";
        exit();
    }
} else {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $funcao = $_POST["funcao"];
    $login = $_POST["login"];
    $status = $_POST["status"];

    $sql_pesquisa = "SELECT login_fun from funcionarios 
                    WHERE login_fun = '$login'
                    AND cod_fun <> '$codigo'";

    $sql_resultado = mysqli_query($conectar, $sql_pesquisa);

    $linhas = mysqli_num_rows($sql_resultado);
    if($linhas == 1) {
        echo "<script> 
                alert ('Login do funcionário já existente!! Tente Novamente')
             </script>";
        echo "<script> location.href = ('altera_fun.php?codigo=$codigo') </script>";
        exit();     
    }
    else
    {
        $sql_altera = "UPDATE funcionarios
                       SET nome_fun = '$nome',
                           funcao_fun = '$funcao',
                           login_fun = '$login',
                           senha_fun = '$senha',
                           status_fun = '$status'
                        WHERE cod_fun = '$codigo'";
        $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
        if($sql_resultado_alteracao == true){
            echo "<script> alert ('$nome alterado com sucesso!!!') </script>";
            echo "<script> location.href = ('lista_fun.php') </script>";
            exit();
        } else {
            echo "<script> alert ('Ocorreu um erro no servidor
                                   Dados do funcionário não foram alterados.
                                   Tente novamente!!') </script>";
            echo "<script> location.href = ('altera_fun.php?codigo=<?php echo $codigo; ?>') </script>";
        }
    }
}

?>