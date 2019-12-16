<?php
include("liberador.php");

$nomeCompleto = mysqli_real_escape_string($conexao, trim($_POST['nomecompleto']));
$data = mysqli_real_escape_string($conexao, trim($_POST['data']));
$turma = mysqli_real_escape_string($conexao, trim($_POST['turma']));
$necessidades = mysqli_real_escape_string($conexao, trim($_POST['necessidades']));

$id = $_SESSION['id'];
//verifica se tem campo vazio
if($_POST['nomecompleto'] == "" or $_POST['data'] == "" or $_POST['turma'] == "Escolha a Turma" or $_POST['necessidades'] == ""){
    $_SESSION['campo_vazio1'] = true;
    header('Location: home.php');
    exit;
}

$query = "UPDATE `alunos` SET `nome` = '$nomeCompleto', `datadenascimento` = '$data', `turma` = '$turma', `necessidades` = '$necessidades' WHERE `alunos`.`id` = '$id'";
$result = mysqli_real_escape_string($conexao, $query);

if($conexao->query($query) === TRUE) {
    $_SESSION['alterado'] = true;
    $conexao->close();
    header('Location: home.php');
    exit;
} else {
    echo 'Não foi possível consultar o banco de dados';
}
?>