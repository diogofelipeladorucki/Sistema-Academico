<?php
include("liberador.php");

$id = $_GET['id']; // recebe o parametro de id via GET

$query = "SELECT id, nome, datadenascimento, turma, necessidades FROM alunos WHERE id='$id'";
$result = mysqli_query($conexao, $query); 
$apresentar = mysqli_fetch_array($result);

$data = date('d/m/Y', strtotime($apresentar['datadenascimento']));
list($dia, $mes, $ano) = explode('/', $data);
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Sistema Acadêmico</title>
    <style>
        .fonte{ font-size: 20px;}
    </style>
</head>
<body>	
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-md navbar-dark bg-dark mt-3">
				<a class="navbar-brand mr-auto ml-auto " href="home.php">
				<h1 class="">Sistema Acadêmico</h1>
				</a>
			</nav>
		</div>
    </header>

    <nav caria-label="breadcrumb">
		<ol class="breadcrumb offset-md-1 col-md-10">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalhamento</li>
		</ol>
	</nav><br>

    <div class="row">
        <div class="offset-md-10">
            <p class="fone"><b>Matricula: </b><?php echo $apresentar['id'];?></p>
        </div>
    </div>
    <div class="row">
        <div class=" offset-md-1 col-md-4">
            <p class="fonte"><b>Aluno: </b><?php echo $apresentar['nome'].'  <i>(' .$idade . ' anos)</i>';?></p>
        </div>
        <div class="offset-md-1">
            <p class="fonte"><b>Turma: </b><?php echo $apresentar['turma'];?></p>
        </div>
    </div>
    <div class="row">
        <div class=" offset-md-1 col-md-4">
            <p class="fonte"><b>Data de nascimento: </b><?php echo $data = date('d/m/Y', strtotime($apresentar['datadenascimento']));?></p>
        </div>
 
        <div class="offset-md-1 ">
            <p class="fonte"><b>Necessidades Especiais: </b><?php echo $apresentar['necessidades'];?></p>
        </div>
    </div>

	<div id ="conteudo"></div>

    <footer class="container-fluid bg-dark">
        <div class="text-muted text-center">
            <p class="text-muted text-center">diogo.felipe@outlook.com - by Diogo Felipe</p>
        </div>
    </footer>
</body>
</html>