<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Adicionar Contato</title>
</head>

<body>
<div class="container">
<h1 class="text-center text-monospace">Adicionar</h1>

<form method="POST" action="adicionar_submit.php">
	
	<div class="form-group">
	<input class="form-control" type="text" placeholder="Nome" name="nome">
	</div>

	<div class="form-group">
	<input class="form-control" type="email" placeholder="E-mail" name="email">
	</div>

	<input class="btn btn-primary" type="submit" value="Adicionar">

</form>

</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>