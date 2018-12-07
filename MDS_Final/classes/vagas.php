<?php

/**
* 
*/
class vagas 
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
	public function cadastrar($id_emp, $descricao, $cidade, $estado, $area, $curso, $cargo){
		global $pdo;
		
		
			//caso não, cadastrar
			$sql = $pdo->prepare("INSERT INTO vagas (id_emp, descricao, cidade, estado, area, curso, cargo) VALUES ( :id_e, :des, :cid, :est, :ar, :cur, :car)");
			
			$sql->bindValue(":id_e",$id_emp);
			$sql->bindValue(":des",$descricao);
			$sql->bindValue(":cid",$cidade);
			$sql->bindValue(":est",$estado);
			$sql->bindValue(":ar",$area);
			$sql->bindValue(":cur",$curso);
			$sql->bindValue(":car",$cargo);
			$sql->execute();
			return true; //foi cadastrado

		
		

	}

	public function excluir($id_vagas){
		global $pdo;
		$sql = $pdo->prepare("DELETE FROM vagas WHERE id_vagas = :iv");

		$sql->bindValue(":iv",$id_vagas);
		$sql->execute();
		return true;

	}



	
		public function editar($id_vagas, $descricao){
		global $pdo;
		$sql = $pdo->prepare("UPDATE vagas SET descricao = :des where id_vagas = :id");
		$sql->bindValue(":des",$descricao);
		$sql->bindValue(":id",$id_vagas);
			$sql->execute();
		return true;

	}

}



?>