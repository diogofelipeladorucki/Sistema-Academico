<?php
include("liberador.php");

$nomeCompleto = mysqli_real_escape_string($conexao, trim($_POST['nomecompleto']));
$data = mysqli_real_escape_string($conexao, trim($_POST['data']));
$turma = mysqli_real_escape_string($conexao, trim($_POST['turma']));
$necessidades = mysqli_real_escape_string($conexao, trim($_POST['necessidades']));
//$data = date('d-m-Y', strtotime($data));

if($_POST['nomecompleto'] == "" or $_POST['data'] == "" or $_POST['turma'] == "Escolha a Turma" or $_POST['necessidades'] == ""){
    $_SESSION['campo_vazio1'] = true;
    header('Location: cadastraaluno.php');
    exit;
}

$query = "SELECT nome FROM alunos WHERE nome='$nomeCompleto'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if ($row > 0) {
    $_SESSION['duplicado'] = true;
    $conexao->close();
    header('Location: cadastraaluno.php');
    exit;
} else {
    $query2 = "INSERT INTO `alunos` (`id`, `nome`, `datadenascimento`, `turma`, `necessidades`) VALUES (NULL, '$nomeCompleto', '$data', '$turma', '$necessidades');";
    $result = mysqli_query($conexao, $query);
    
    if($conexao->query($query2) === TRUE) {
        $_SESSION['aluno_cadastrado'] = true;
        $_SESSION['nomecompleto'] = $nomeCompleto;
        $conexao->close();
        header('Location: cadastraaluno.php');
        exit;
    } else {
        echo "Não foi possível consultar o banco de dados";
    }
}


?>