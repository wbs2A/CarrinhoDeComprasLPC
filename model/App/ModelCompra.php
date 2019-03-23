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

    public function getCarrinho(){
        $idcompra = $this->getCompra($_SESSION['user']->cliente_id);
        $stmt = $this->conexao->prepare("select * from produto_has_compra where Compra_idCompra=".$idcompra.";");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
