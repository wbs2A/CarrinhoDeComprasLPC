<?php
/**
 * Created by PhpStorm.
 * User: Betelgeuse
 * Date: 19/03/2019
 * Time: 15:16
 */

include_once 'banco.php';
class ModelCompra{

    private $conexao;

    public function __construct(){
        $this->conexao = Banco::getInstance();
    }

    public function getCompra($cliente){
        $stmt = $this->conexao->prepare("call getOrSetCompra(?,@t);");
        $stmt->execute(array($cliente));
        $stmt=$this->conexao->prepare("select @t;");
        $stmt->execute();
        $compra = $stmt->fetchObject();
        return $compra->{'@t'};

    }

    public function insertCarrinho($produto, $qquantidade=1){
        $compra = $this->getCompra($_SESSION['user']->cliente_id);
        if($compra){
            $stmt = $this->conexao->prepare("call InserirCarrinho(".
                $_SESSION['user']->cliente_id.",".
                $produto.",".
                $qquantidade.",".
                $compra.");");
            return $stmt->execute();
        }
    }

    public function checkProd($prod=0){
        if($prod)
            return count($this->getCarrinho($prod));
        else
            return count($this->getCarrinho());
    }
    public function getCarrinho($prod=0){
        $idcompra = $this->getCompra($_SESSION['user']->cliente_id);
        $q = "select * from produto_has_compra where Compra_idCompra=".$idcompra;
        if($prod)
            $q = $q." and Produto_idProduto = ".$prod;
        $q = $q.";";
        $stmt = $this->conexao->prepare($q);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function finalizaCompra($id){
        $stmt = $this->conexao->query("UPDATE `compra` SET `estado`='Finalizado', `entrega`='semComprovante' WHERE idCompra=".$id);
        $stmt->execute();
    }
}
