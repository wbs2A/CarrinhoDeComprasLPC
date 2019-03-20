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
    public function setAll($query) {
        $statement = $this->conexao->query($query);
        return $statement;
    }
    public function getPaises($query='select p.nome, p.SL_NOME_PT from pais p;'){
        $dados= $this->getAll($query);
        return $dados;
    }
    public function getPais($dados){
        $pais= $this->getAll('SELECT retornaPais("'.$dados['pais'].'");');
        return $pais[0]->{'retornaPais("'.$dados['pais'].'")'};
    }
    public function getEstado($dados,$pais){
        $estado= $this->getAll('SELECT retornaEstado( "'.$dados['estado'].'",'.$pais.')');
        return $estado[0]->{'retornaEstado( "'.$dados['estado'].'",'.$pais.')'};
    }
    public function getCidade($dados,$estado){
        $cidade= $this->getAll('SELECT retornaCidade("'.$dados['cidade'].'",'.$estado.');');
        if (!isset($cidade[0]->{'retornaCidade("'.$dados['cidade'].'",'.$estado.')'})) {
            $ch = curl_init();
            $optArray = array(
                CURLOPT_URL => 'https://api.postmon.com.br/v1/cep/'.$dados['cep'],
                CURLOPT_RETURNTRANSFER => true
            );
            // apply those options
            curl_setopt_array($ch, $optArray);
            $t=curl_exec($ch);
            $j=json_decode($t);
            echo $j->cidade;
            curl_close($ch);
            $this->setAll('call InserirCidade('.$j->cidade_info->codigo_ibge.',"'.$j->cidade.'","'.$estado.'")');
            $cidade= $this->getAll('SELECT retornaCidade("'.$dados['cidade'].'",'.$estado.');');
        }
        return $cidade[0]->{'retornaCidade("'.$dados['cidade'].'",'.$estado.')'};
    }
    public function getPaisesS(){
        $dados= $this->getPaises();
        $html='';
        foreach ($dados as $key => $value2) {
            $html=$html.' <option>'.$value2->SL_NOME_PT.'</option>';
        }
        return $html;
    }

}