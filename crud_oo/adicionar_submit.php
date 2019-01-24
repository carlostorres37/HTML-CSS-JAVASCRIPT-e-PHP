<?php 
include 'contato.class.php';
$contato = new Contato();

//verifica se não estiver vazio
if (!empty($_POST['email'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$contato->adicionar($email,$nome);

	header("Location: index.php");
}

//não vai carregar essa página, então é uma boa prática não fechar o php