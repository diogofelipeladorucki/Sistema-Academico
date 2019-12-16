<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$username = mysqli_real_escape_string($conexao, trim($_POST['username']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

//verifica se algum campo faltou ser preenchido
if($_POST['nome'] == "" or $_POST['username'] == "" or $_POST['email'] == "" or $_POST['senha'] == ""){
    $_SESSION['campo_vazio'] = true;
    header('Location: cadastro.php');
    exit;
}

$query = "SELECT id FROM usuarios where username='$username'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if ($row == 1) { //verifica se o username está cadastrado
    $_SESSION['username_cadastrado'] = true;
    header('Location: cadastro.php');
    exit;
} else { //verifica se o email está cadastrado
    $query = "SELECT id FROM usuarios where email = '$email'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $_SESSION['email_cadastrado'] = true;
        header('Location: cadastro.php');
        exit;
    } else {
        $query = "INSERT INTO usuarios (nome, username, email, senha) VALUES ('$nome', '$username', '$email', '$senha');";
    }
}

if($conexao->query($query) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;

?>