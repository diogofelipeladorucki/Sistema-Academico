<?php
include("liberador.php");

$id = $_GET['id']; // recebe o parametro de id via GET

$query = "DELETE FROM alunos WHERE id='$id'";
$result = mysqli_query($conexao, $query); 

if($conexao->query($query) === TRUE) {
    $_SESSION['excluido'] = true;
    $conexao->close();
    header('Location: home.php');
    exit;   
}
?>