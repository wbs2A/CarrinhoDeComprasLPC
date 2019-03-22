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
        $stmt = $this->conexao->prepare("select idCompra from compra where cliente_id=".$cliente." and estado='Nocarrinho';");
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function insertCarrinho($produto, $qquantidade=1){
        $compra = $this->getCompra($_SESSION['user']->cliente_id);
        if($compra){
            $stmt = $this->conexao->prepare("call InserirCarrinho(".
                $_SESSION['user']->cliente_id.",".
                $produto.",".
                $qquantidade.",".
                $compra->idCompra.");");
            return $stmt->execute();
        }
    }

    public function getCarrinho(){
        $idcompra = $this->getCompra($_SESSION['user']->cliente_id);
        $stmt = $this->conexao->prepare("select * from produto_has_compra where Compra_idCompra=".$idcompra->idCompra.";");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
