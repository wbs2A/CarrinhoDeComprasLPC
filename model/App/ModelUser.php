<?php
include_once('banco.php');
include_once('ModelEndereco.php');
/**
 *
 */
class ModelUser{
	private $conexao;
    public function __construct(){
    	$this->conexao= Banco::getInstance();
    }
    public function getAll($query) {
        $statement = $this->conexao->query($query);
        return $this->processResults($statement);
    }
    public function setAll($query) {
        $statement = $this->conexao->query($query);
        return $statement;
    }

    private function processResults($statement) {
        $results = array();
        if($statement) {
            while($row = $statement->fetchObject()) {
            	array_push($results, $row);
            }
        }
        return $results;
    }
    public function validaUser($dados){
        $user= $this->getAll('select * from login l where l.cpf="'.$dados["cpf"].'" and l.senha ="'.$dados["senha"].'";');
        return $user[0];
    }
    public function insertUser($dados){
        $pais = (new ModelEndereco())->getPais($dados);
        $estado= (new ModelEndereco())->getEstado($dados,$pais);
        $cidade= (new ModelEndereco())->getCidade($dados,$estado);
        $t=$this->setAll('call InserirUser("'.$dados['nome'].'","'.$dados['email'].'","'.$dados['nascimento'].'","'.
				$dados['tipo'].'","'.$dados['telefone'].'","'.$dados['cpf'].'","'.$dados['rg'].'",'.$pais.',"'.$dados['cep'].'",'.
				$dados['numero'].',"'.$dados['bairro'].'", "'.$dados['rua'].'",'.$estado.','.$cidade.',"'.$dados['senha'].'",'.
				$dados['numero'].','.$dados['vcc'].','.$dados['validade-cartao'].');');
        $user=$this->validaUser($dados);
        return $user;
    }
}
