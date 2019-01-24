<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Controle de Contatos</title>
</head>

<body>
<div class="container">
	<?php 
	include 'contato.class.php';
	$contato = new Contato();
	?>

	<h1 class="text-center text-monospace">Contatos</h1>

	<a class="btn btn-primary" href="adicionar.php"> Adicionar</a> <br><br>

	<table  class="table table-sm table-hover">
		<thead>
			<tr class="table-active">
				<th scope="col">ID</th>
				<th scope="col">NOME</th>
				<th scope="col">E-MAIL</th>
				<th scope="col">AÇÕES</th>
			</tr>
		</thead>
		<?php 
		//Completando a tabela com todos os campo da tabela CONTATOS
		$lista = $contato->getAll();
		foreach($lista as $item):
		?>
		<tbody>
			<tr>
				<td><?php echo $item['id']; ?></td>
				<td><?php echo $item['nome']; ?></td>
				<td><?php echo $item['email']; ?></td>
				<td>
					<a class="btn btn-primary btn-sm" href="editar.php?id=<?php echo $item['id']; ?>">EDITAR</a>
					<a class="btn btn-primary btn-sm" href="excluir.php?id=<?php echo $item['id']; ?>">EXCLUIR</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>
</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>