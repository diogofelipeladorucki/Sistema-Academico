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
    
  <?php
    if (isset($_SESSION['username_cadastrado'])):
    ?>
    <div class="centralizar" id="alerta"class="container-fluid">
      <div class="row justify-content-center">
        <div id="alert" class="alert alert-danger col-auto" role="alert">
          Este nome de usuário já está cadastrado. <br>Informe outro e tente novamente.
        </div>
      </div>
    </div>
    <?php
    endif;
    unset($_SESSION['username_cadastrado']);
    ?>

    <?php
    if (isset($_SESSION['email_cadastrado'])):
    ?>
    <div id="alerta"class="container-fluid">
      <div class="row justify-content-center">
        <div id="alert" class="alert alert-danger col-auto" role="alert">
          Este email já está cadastrado. <br>Informe outro e tente novamente.
        </div>
      </div>
    </div>
    <?php
    endif;
    unset($_SESSION['email_cadastrado']);
    ?>

    <?php
    if (isset($_SESSION['campo_vazio'])):
    ?>
    <div id="alerta"class="container-fluid">
      <div class="row justify-content-center">
        <div id="alert" class="alert alert-danger col-auto" role="alert">
          Todos os campos devem ser preenchidos.
        </div>
      </div>
    </div>
    <?php
    endif;
    unset($_SESSION['campo_vazio']);
    ?>

    <?php 
    if (isset($_SESSION['status_cadastro'])):
    ?>
      <div id="alerta2" class="container-fluid">
        <div class="row justify-content-center">
          <div class="alert alert-success" role="alert">
            Cadastro efetuado com sucesso! <br>Faça o login <a href="index.php" class="alert-link">aqui</a>.
          </div>
        </div>
      </div>
    <?php
    endif;
    unset($_SESSION['status_cadastro'])
    ?>

    <form class="formlogin" action="cadastrar.php" method="POST" class="text-center">
        <div id="caixadelogin" class="container-fluid ">
            <div class="form-group row">
                <div class="offset-md-4 col-md-4">
                    <input name="nome" type="text" class="form-control text-muted text-center" minlength="3" maxlength="100" placeholder="Nome Completo">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-4 col-md-4">
                    <input name="username" type="text" class="form-control text-muted text-center" minlength="3" maxlength="100" placeholder="Nome de Usuário">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-4 col-md-4">
                    <input name="email" type="email" class="form-control text-muted text-center" minlength="3" maxlength="100" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-4 col-md-4">
                    <input name="senha" type="password" class="form-control text-muted text-center" minlength="3" maxlength="100" placeholder="Senha">
                </div>
            </div>

            <div class="text-center" class="form-group row">
                <div class="offset-md-4 col-md-4">
                    <button type="submit" type="button" class="btn btn-outline-success green">Criar Conta</button>
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