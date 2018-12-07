/* Tabelas do Banco de Dados */

/* Dados de conexão com Banco:  
servidor = “localhost”;
usuario = “root”;
senha = “ ”;
dbname = “web_estagio”;
	*/
	/*
Tabela do Candidato:
	*/	
		CREATE TABLE candidato(
			id_candidato int AUTO_INCREMENT PRIMARY KEY,
			nome VARCHAR(30),
			cpf VARCHAR(11),
			curso VARCHAR(30),
			instituicao VARCHAR(40),
			telefone VARCHAR(30),
			email VARCHAR(40),
			senha VARCHAR(32)
		);
/*
Tabela da Empresa:
*/
		CREATE TABLE empresa(
			id_empresa int AUTO_INCREMENT PRIMARY KEY,
			nome VARCHAR(30),
			CNPJ VARCHAR(14),
			telefone VARCHAR(30),
			email VARCHAR(40),
			senha VARCHAR(32)
		);
/*
Tabela das Vagas:
*/	
		CREATE TABLE vagas(
			id_vagas int AUTO_INCREMENT PRIMARY KEY,
			id_emp int(11),
			descricao VARCHAR(200),
			cidade VARCHAR(30),
			estado VARCHAR(30),
			area VARCHAR(30),
			curso VARCHAR(30),
			cargo VARCHAR(30)
		);
/*
Tabela Cadastro Vaga:
*/
		CREATE TABLE cadastrovaga(
			id_cadastro int AUTO_INCREMENT PRIMARY KEY,
			id_cand int(11),
			id_vag int(11)
		);