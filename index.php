<?php
session_start();
unset($_SESSION['usuario']);
session_destroy();
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
	
	<form class="formlogin" action="logar.php" method="POST" class="text-center">
      <div id="caixadelogin" class="container-fluid ">
        <div class="form-group row">
            <div class="offset-md-4 col-md-4">
                <input name="usuario" type="text" class="form-control text-muted text-center" minlength="3" placeholder="Usuário ou Email">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-md-4 col-md-4">
                <input name="senha" type="password" class="form-control text-muted text-center" minlength="3" placeholder="Senha">
            </div>
        </div>
        <div class="text-center" class="form-group row">
          <div class=" offset-md-2 col-md-8">
            <button onclick="window.location.href = 'cadastro.php'" type="button" class="btn btn-link green  btn-sm ">Registrar-se</button>
            <button type="submit" type="button" value="entrar" class="btn btn-primary grande btn-sm">Entrar</button>
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