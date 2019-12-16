<?php
include("liberador.php");

if (isset($_GET['id'])) {// evita entrar na pagina sem aluno para atualizar
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $query = "SELECT nome, datadenascimento, turma, necessidades FROM alunos WHERE id='$id'";
    $result = mysqli_query($conexao, $query); 
    $preencher = mysqli_fetch_array($result);
} else {
    header('location: home.php');
    exit;
}


?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Sistema Acadêmico</title>
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
            <li class="breadcrumb-item active" aria-current="page">Atualizar Cadastro</li>
		</ol>
	</nav><br>
  
	<form class="formlogin" action="editar.php" method="POST" class="text-center">
      <div id="caixadelogin" class="container-fluid ">
        <div class="form-group row">
            <div class="offset-md-4 col-md-4">
            <b>Nome Completo:</b><input value="<?php echo $preencher['nome']; ?>" name="nomecompleto" type="text" class="form-control text-muted " minlength="3">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-md-4 col-md-4">
                <b>Data de Nascimento:</b> <input value="<?php echo $preencher['datadenascimento']; ?>" name="data" type="date" class="form-control text-muted text-center" minlength="3">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-md-4 col-md-2 form-group">
                <b>Turma:</b> <select value="<?php echo $preencher['turma']; ?>" name="turma" class="form-control" id="exampleFormControlSelect1">
                    <option selected>Escolha a Turma</option>
                    <option value="1 Ano">1° Ano</option>
                    <option value="2 Ano">2° Ano</option>
                    <option value="3 Ano">3° Ano</option>
                </select>
            </div>
            <div class="col-md-2 form-group">
                <b>Necessidades Especiais:</b> <select name="necessidades" class="form-control" id="exampleFormControlSelect1">
                    <option value="Nao" selectd>Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
          <div class=" offset-md-7 col-md-8">
            <button type="submit" type="button" value="alterar" class="btn btn-primary grande btn-sm">Alterar</button>
          </div>
        </div>
      </div>
    </form>

	<div id ="conteudo"></div>

    <footer class="container-fluid bg-dark">
        <div class="text-muted text-center">
            <p class="text-muted text-center">diogo.felipe@outlook.com - by Diogo Felipe</p>
        </div>
    </footer>
</body>
</html>