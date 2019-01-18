<?php
//Fazendo a conexão com o banco de dados
try {
	$pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost","root","");
	
} catch (PDOException $e) {
	echo "ERRO: ".$e->getMessage();
}
//Verificando se foi enviado os dados para o formulário
	if (isset($_GET['ordem'])&& empty($_GET['ordem'])==false) {
		//addslashes - proteção dos dados enviados pelo usuário colocando uma barra invertida em uma string
		$ordem = addslashes($_GET['ordem']);
		$sql="SELECT * FROM usuarios ORDER BY ".$ordem;
	} else {
		$ordem='';
		$sql="SELECT * FROM usuarios";
	}
?>



<form method="GET">
	<!--
		onchange="this.form.submit()"
		Assim que for escolhida uma opção a página será atualizada
	-->
	<select name="ordem" onchange="this.form.submit()"> 
		<option></option>
		<!--
			selected=selected
			vai deixar escolhido marcado/senão colocar isso ele some
		-->
		<option value="nome" <?php echo ($ordem=="nome")?'selected=selected':""; ?>>Pelo nome</option>
		<option value="idade" <?php echo ($ordem=="idade")?'selected=selected':""; ?>>Pelo idade</option>
	</select>
</form>

<!-- Montando a tabela que vai receber o banco de dados -->
<table border="1px" width="400px">
	<tr>
		<th>Nome</th>
		<th>Idade</th>
	</tr>
	<?php
	

	$sql=$pdo->query($sql);
	//verificando se houve algum resultado
	if ($sql->rowCount()>0) {
		//transformando os dados do SQL para um array
		foreach($sql->fetchAll() as $usuario){
			?>
			<!-- 
				Fechou a estrutura do PHP para montar um tabela em HTMl 
			-->
			<tr>
				<td><?php echo $usuario['nome']; ?></td>
				<td><?php echo $usuario['idade']; ?></td>
			</tr>
			<?php
		}
	}
	?>
</table>