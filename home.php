<?php
include("liberador.php");

$query = "SELECT * FROM alunos";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

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
	</header><br>

	<div class="form-group row">
		<div id="olaafastar" class="col-md-11">
			<p style="margin-left:30px;">Olá, <b><?php echo $_SESSION['usuario']; ?></b></p>
		</div>
		<div class="col-">
			<a href="index.php"><b>Sair</b></a>
		</div>
	</div><br>

	<?php
    if (isset($_SESSION['excluido'])):
    ?>
    <div id="alerta"class="container-fluid">
      <div class="row justify-content-center">
        <div id="alert" class="alert alert-success col-auto" role="alert">
          Aluno excluído com sucesso.
        </div>
      </div>
    </div>
    <?php
    endif;
    unset($_SESSION['excluido']);
	?>
	
	<?php
    if (isset($_SESSION['campo_vazio1'])):
    ?>
    <div id="alerta"class="container-fluid">
      <div class="row justify-content-center">
        <div id="alert" class="alert alert-danger col-auto" role="alert">
          Atualização não realizada. Preencha todos os campos.
        </div>
      </div>
    </div>
    <?php
    endif;
    unset($_SESSION['campo_vazio1']);
    ?>
  
    <?php
    if (isset($_SESSION['alterado'])):
    ?>
    <div id="alerta" class="container-fluid">
      <div class="row justify-content-center">
        <div id="alert" class="alert alert-success col-auto" role="alert">
          <?php echo "Atualização feita com sucesso.";?>
        </div>
      </div>
    </div>
    <?php
    endif;
    unset($_SESSION['alterado']);
	?>
	
	<form action="home.php" method="GET" class="">
		<div class="form-group row offset-2">
			<div class="form-group col-md-4">
				<input name="buscar" type="text" class="form-control text-center" id="inputPassword2" placeholder="Nome do Aluno">
			</div>
			<div class="col-md-1">
				<button type="submit" class="btn btn-primary">Buscar</button>	
			</div>
			<div class="offset-md-2 col-md-3">
				<button onclick="window.location.href = 'cadastraaluno.php'" id="btn-novoaluno" id="teste" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Novo Aluno</button>
			</div>
		</div>
	</form>

	<div class="form-group row">
		<div class=" offset-md-2 col-md-8">
			<table class="table table-sm table-striped table-hover">
				<thead class="thead-dark">
					<tr>
					<th scope="col">ID</th>
					<th scope="col">Nome</th>
					<th scope="col">Turma</th>
					<th></th>
					<th></th>
					</tr>
				</thead>

				<?php
				if(isset($_GET['buscar'])) { // quando clica no botão buscar
					$buscar = $_GET['buscar'];
					if ($buscar == "") { //quando o parametro está vazio consulta os 50 primeiros resultados
						$query = mysqli_query($conexao, "SELECT id, nome, turma FROM alunos ORDER BY id ASC LIMIT 50");
						while ($tabela = mysqli_fetch_array($query)) { 
				?>
				<tbody>
					<tr>
						<a href="edita.php?id=<?php echo $tabela['id']?>">
						<td><?php echo $tabela['id']; ?></td>
						<td class="btn" style="padding-right: 100px;"><a href="detalhamento.php?id=<?php echo $tabela['id']?>"><?php echo $tabela['nome']; ?></a></td>
						<td><?php echo $tabela['turma']; ?></td></a>
						<td><a href="edita.php?id=<?php echo $tabela['id']?>" class="btn btn-outline-secondary btn-sm">Editar</a></td>
						<td><a href="deletar.php?id=<?php echo $tabela['id']?>" class="btn btn-outline-danger btn-sm">Excluir</a></td>
					</tr>
				</tbody>
				<?php
						} 
					} else { // quando o parametro tem algo
						$query = mysqli_query($conexao, "SELECT id, nome, turma FROM alunos WHERE nome LIKE'%$buscar%' ORDER BY id ASC");
						while ($tabela = mysqli_fetch_array($query)) { 
				?>
				<tbody>
					<tr>
						<td><?php echo $tabela['id']; ?></td>
						<td  class="btn" style="padding-right: 100px;"><a href="detalhamento.php?id=<?php echo $tabela['id']?>"><?php echo $tabela['nome']; ?></a></td>
						<td><?php echo $tabela['turma']; ?></td></a>
						<td><a href="edita.php?id=<?php echo $tabela['id']?>" class="btn btn-outline-secondary btn-sm">Editar</a></td>
						<td><a href="deletar.php?id=<?php echo $tabela['id']?>" class="btn btn-outline-danger btn-sm">Excluir</a></td>
					</tr>
				</tbody>
				<?php
						}
					}
				}
				?>
				
			</table>
		</div>
	</div>

	<div id ="conteudo"></div>

    <footer class="container-fluid bg-dark">
		<div class="row">
			<div style="margin-left: 38.5%;" class="offset-md-4">
				<p class="text-muted">diogo.felipe@outlook.com - by Diogo Felipe</p>
			</div>
			<div class="offset-md-3">
				<p style="color:white;" ><?php echo $row;?>  Alunos Cadastrados</p>
			</div>
		</div>
    </footer>
</body>
</html>