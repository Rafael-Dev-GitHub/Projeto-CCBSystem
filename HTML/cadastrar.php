<?php 
session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$nivel = mysqli_real_escape_string($conexao, trim($_POST['nivel']));

$sql = "select count(*) as total from usuario where usuario='$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe']=true;
    header('Location: cadastro.php');
    exit;
}

$sql = "INSERT INTO usuario (usuario, senha, nivel, data_cadastro) VALUES ('$usuario','$senha','$nivel',NOW())";

if($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;

?>