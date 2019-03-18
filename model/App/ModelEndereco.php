<?php
include_once('banco.php');
/**
 * 
 */
class ModelEndereco{
	private $conexao;
    public function __construct(){
    	$this->conexao= Banco::getInstance();
    }

    public function getAll($query) {
        $statement = $this->conexao->query($query);
        return $this->processResults($statement);
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
    public function getPais($query='select p.nome, p.SL_NOME_PT from pais p;'){
        $dados= $this->getAll($query);
        return $dados;
    }
}