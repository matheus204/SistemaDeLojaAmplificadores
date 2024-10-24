<?php
session_start();
include ("conexao.php");

$codigo = $_POST["codigo"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$preco = $_POST["preco"];
$tipo = $_POST["tipo"];
$foto = $_FILES["foto"];

if($foto["name"] <> ""){
    $foto_nome = "img/".$foto["name"];
    move_uploaded_file($foto["tmp_name"], $foto_nome);
} else {
    $pesquisa_caminho_foto = "SELECT foto_amp
                              FROM amplificadores
                              WHERE cod_amp = '$codigo'";

    $resultado_pesquisa = mysqli_query($conectar, $pesquisa_caminho_foto);
    $registro = mysqli_fetch_row($resultado_pesquisa);
    $foto_nome = $registro[0];
} 
$sql_altera = "UPDATE amplificadores
               SET      marca_amp = '$marca',
                        modelo_amp = '$modelo',
                        preco_amp = '$preco',
                        tipo_amp = '$tipo',
                        foto_amp = '$foto_nome'
                WHERE   cod_amp = '$codigo' ";

$sql_resultado_alteracao = mysqli_query($conectar,$sql_altera);
if($sql_resultado_alteracao == true){
    echo "<script> alert ('$modelo alterado com sucesso!!!') </script>";
    echo "<script> location.href = ('lista_amp.php') </script>";
    exit();
} else {
    echo "<script> alert ('Ocorreu um erro no servidor
                           Dados do amplificador não foram alterados.
                           Tente novamente!!') </script>";
    echo "<script> location.href = ('altera_amp.php?codigo=<?php echo $codigo; ?>') </script>";
}
