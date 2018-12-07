
<?php

/**
* 
*/
class empresa 
{
	private $pdo;
	public $msgErro = ""; //se vazia não deu erro no preenchimento
	/* metodo que fará a conexão com o BD */
	public function conectar($nome, $host, $usuario, $senha){
		global $pdo;
		
		try {
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
		} catch (PDOException $e) 
		{
			$msgErro = $e->getMessage();
		}
		
	}

	/* tela de cadastro onde vai enviar para BD*/
	public function cadastrar($nome, $CNPJ, $telefone, $email, $senha){
		global $pdo;
		//verificar se já existe o email cadastrado
		$sql = $pdo->prepare("SELECT id_empresa FROM empresa WHERE email = :e");
		$sql->bindValue(":e",$email);
		$sql->execute();

		/*se existe uma linha com aquele email no banco de dados a pessoa já está cadastrada, então retorne false*/
		if($sql->rowCount() > 0){
			return false; //já cadastrado
		}
		else{
			//caso não, cadastrar
			$sql = $pdo->prepare("INSERT INTO empresa (nome, CNPJ, telefone, email, senha) VALUES (:n, :c, :t, :e, :s)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":c",$CNPJ);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			return true; //foi cadastrado

		}
		

	}
		/* tela de cadastro onde vai enviar para BD*/
	public function excluir($id_empresa){
		global $pdo;
		$sql = $pdo->prepare("DELETE FROM empresa WHERE id_empresa = :i");

		$sql->bindValue(":i",$id_empresa);
		$sql->execute();
		return true;

	}



	
		public function editar($nome, $CNPJ, $telefone, $email, $senha){
		global $pdo;
		$sql = $pdo->prepare("UPDATE empresa SET nome = :n, CNPJ =:c, telefone = :t, email = :e, senha = :s WHERE email = :e
			");
		$sql->bindValue(":n",$nome);
			$sql->bindValue(":c",$CNPJ);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
		return true;

	}

	/* verificar se está logada ou não*/
	

	public function logar($email, $senha){
		global $pdo;
		
		//verificar se email e senhas estão cadastrados, se sim
		$sql = $pdo->prepare("SELECT id_empresa FROM empresa WHERE email = :e AND senha = :s");
		$sql->bindValue(":e",$email);
		$sql->bindValue(":s",md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){
			//entrar no sistema (sessao) pq está castrada
			$dado = $sql->fetch();
			//atraves da sessão o usuario entra na sua area privada.
			session_start();
			$_SESSION['id_empresa'] = $dado['id_empresa'];
			return true; //logado com sucesso
		}
		else{
			return false; //não foi possivel logar
		}
	}
}

?>