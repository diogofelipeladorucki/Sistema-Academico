<?php
session_start();
include("conexao.php");

//dá a permissão para entrar nas páginas somente se estiver logado
if(!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>