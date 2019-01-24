<?php 

class Contato{
	//variável para fazer a conexão com o banco de dados
	private $pdo;

	public function __construct(){
		//fazendo a conexão com o banco de dados dentro de um construtor
		$this->pdo = new PDO("mysql:dbname=crudoo;host=localhost","root","");
	}

	//CREATE (crud)
	public function adicionar($email, $nome=''){
		//Primeiro vai verificar se NÃO existe um email
		//para depois adiciona-lo
		if ($this->existeEmail($email)==false) {
			$sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nome",$nome);
			$sql->bindValue(":email",$email);
			$sql->execute();

			return true;
		}  else{
			return false;
		}
	}

	//READ (crud)
	//não está utilizando ele
	public function getNome($email){
		//Ele vai ler somente o email pois é o mais importante no caso (e pelo email vai achar o nome)
		$sql = "SELECT nome FROM contatos WHERE email=:email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email",$email);
		$sql->execute();

		//verificando se achou algo na consulta
		if ($sql-rowCount()>0) {
			//pega o resultado e joga a variável info
			$info = $sql->fetch();

			return $info['nome'];
		} else {
			//se nao digitar um email que nao existe ele nao vai retornar nenhum nome 
			return '';
		}

	}

	public function getInfo($id){
		$sql = "SELECT * FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if ($sql->rowCount() > 0 ) {
			return $sql->fetch();
		} else {
			return array();
		}
	}

	//Essa função vai pegar a lista de  todos os contatos
	public function getAll(){
		$sql = "SELECT * FROM contatos";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0 ) {
			return $sql->fetchAll();
		} else {
			return array();
		}
	}

	//UPDATE (crud)
	public function editar($nome, $email, $id){
		//esse if não deixa colocar um e-mail igual
		if($this->existeEmail($email) == false){
			$sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nome",$nome);
			$sql->bindValue(":email",$email);
			$sql->bindValue(":id",$id);
			$sql->execute();
			return true;
		} else {
			return false;
		}
	}

	//DELETE (crud)
	//é recomendável utilizar o id para nao mandar informações via URL
	public function excluirPeloId($id){
		$sql = "DELETE FROM contatos where id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id",$id);
		$sql->execute();
	}

	public function excluirPeloEmail($email){
		$sql = "DELETE FROM contatos where email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email",$email);
		$sql->execute();
	}

	private function existeEmail($email){
		$sql = "SELECT * FROM contatos WHERE email = :email";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":email",$email);
		$sql->execute();

		if ($sql->rowCount()>0) {
			return true;
		}else{
			return false;

		}
	}


}


?>