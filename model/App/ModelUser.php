<?php
include_once('banco.php');
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
        
    }
}