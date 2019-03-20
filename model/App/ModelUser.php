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
        $pais = $this->getAll('SELECT retornaPais("'.$dados['pais'].'");');
        $estado= $this->getAll('SELECT retornaEstado( "'.$dados['estado'].'",'.$pais[0]->{'retornaPais("'.$dados['pais'].'")'}.')');

        $cidade= $this->getAll('SELECT retornaCidade("'.$dados['cidade'].'",'.$estado[0]->{'retornaEstado( "'.$dados['estado'].'",'.$pais[0]->{'retornaPais("'.$dados['pais'].'")'}.')'}.')');

        $t=$this->setAll('call InserirUser("'.$dados['nome'].'","'.$dados['email'].'","'.$dados['nascimento'].'","'.$dados['tipo'].'","'.$dados['telefone'].'","'.$dados['cpf'].'","'.$dados['rg'].'",'.$pais[0]->{'retornaPais("'.$dados['pais'].'")'}.',"'.$dados['cep'].'",'.$dados['numero'].',"'.$dados['bairro'].'", "'.$dados['rua'].'",'.$estado[0]->{'retornaEstado( "'.$dados['estado'].'",'.$pais[0]->{'retornaPais("'.$dados['pais'].'")'}.')'}.','.$cidade[0]->{'retornaCidade("'.$dados['cidade'].'",'.$estado[0]->{'retornaEstado( "'.$dados['estado'].'",'.$pais[0]->{'retornaPais("'.$dados['pais'].'")'}.')'}.')'}.',"'.$dados['senha'].'");');
        $user=$this->validaUser($dados);
        return $user;
    }
}