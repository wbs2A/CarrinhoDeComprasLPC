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
		private function getCliente($idcliente){
			return ($this->getAll('select email, rg, endereco_idendereco as idendereco, nascimento from cliente c where id='.$idcliente))[0];
		}
		private function getTelefone($idcliente){
			 return $this->getAll('select * from telefone where cliente_id='.$idcliente);
		}
		private function getEndereco($idendereco){
			return ($this->getAll('SELECT e.rua, e.bairro, e.cep, e.numero, p.SL_NOME_PT as pais, est.Nome as estado, cid.Nome as cidade from endereco e INNER join pais p on e.pais_id = p.id INNER join estado est on e.Estado_Id = est.id INNER JOIN cidade cid on e.Cidade_id = cid.id where e.idendereco ='.$idendereco))[0];
		}
		private function getPagamento($idcliente){
			return ($this->getAll('select * from pagamento where cliente_id='.$idcliente))[0];
		}
		public function infoUser(){
			$user=$_SESSION['user'];
			$cliente=$this->getCliente($user->cliente_id);
			$cliente->telefone = $this->getTelefone($user->cliente_id);
			$cliente->endereco= $this->getEndereco($cliente->idendereco);
			$cliente->user=$user;
			$cliente->pagamento=$this->getPagamento($user->cliente_id);
			return $cliente;
		}
}
