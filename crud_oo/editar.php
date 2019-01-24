<?php 
include 'contato.class.php';
$contato = new Contato();

//vai pegar as informações do usuario
if (!empty($_GET['id'])) {
	$id = $_GET['id'];


	$info = $contato->getInfo($id);

	//confirmando se está preenchido
	if (empty($info['email'])){
		header("Location: index.php");
		exit;
	}
}else {
	header("Location: index.php");
	exit;
}

?>

<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Editar contato</title>
</head>

<body>
<div class="container">
<h1 class="text-center text-monospace">Editar</h1>

<form method="POST" action="editar_submit.php">
	<!-- ele não vai aparecer na tela, mas vai ser enviado -->
	<input type="hidden" name="id" value="<?php echo $info['id']; ?>">

	<div class="form-group">
	Nome: <br>
	<input type="text" class="form-control" name="nome" value="<?php echo $info['nome']; ?>">
	</div>

	<div class="form-group">
	<!-- O USUÁRIO NESSE CASO SÓ PODE TROCAR O NOME-->
	E-mail: <br>
	<input type="email" class="form-control" name="email" value="<?php echo $info['email']; ?>">
	</div>
	<input  class="btn btn-primary" type="submit" value="Salvar">
</form>

</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
