<?php 
include 'contato.class.php';
$contato = new Contato();

//vai verificar qual é id e vai excluir
if (!empty($_GET['id'])) {
	
	$id = $_GET['id'];

	$contato->excluirPeloId($id);

} 
	
header("Location: index.php");
