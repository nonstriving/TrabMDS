<?php

/**
* 
*/
class cadastrovaga 
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
	public function cadastrar($id_cand, $id_vag){
		global $pdo;
		//verificar se já existe o email cadastrado
		$sql = $pdo->prepare("SELECT id_cand and id_vag FROM cadastrovaga WHERE id_cand = :ic and id_vag = :iv");
		$sql->bindValue(":ic",$id_cand);
		$sql->bindValue(":iv",$id_vag);
		
		$sql->execute();

		/*se existe uma linha com aquele email no banco de dados a pessoa já está cadastrada, então retorne false*/
		if($sql->rowCount() > 0){
			return false; //já cadastrado
		}
		else{
			//caso não, cadastrar
			$sql = $pdo->prepare("INSERT INTO cadastrovaga (id_cand, id_vag) VALUES (:ic, :iv)");
			$sql->bindValue(":ic",$id_cand);
			$sql->bindValue(":iv",$id_vag);
			$sql->execute();
			return true; //foi cadastrado

		}
	


	}
}
?>