<?php
session_start();
include('conexao.php');
//reenicia a pagina caso algum campo esteja vazio
if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('location: index.php');
    exit();
}
//recebe os parametros do campo
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

//verifica se o dado que foi dado é o username
$query = "SELECT username FROM usuarios WHERE username='$usuario' AND senha='$senha'";
$result =  mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
$ola = mysqli_fetch_array($result); 

if($row == 1) {
    $_SESSION['usuario'] = $ola['username'];
    header('Location: home.php');
    exit();
} else {
    //verifica se o dado que foi dado é o email
    $query = "SELECT username FROM usuarios WHERE email='$usuario' AND senha='$senha'";
    $result =  mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result); 
    $ola = mysqli_fetch_array($result);    

    if($row == 1) {
        $_SESSION['usuario'] = $ola['username'];//username a ser mostrado na tela inicial
        header('Location: home.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
}
?>