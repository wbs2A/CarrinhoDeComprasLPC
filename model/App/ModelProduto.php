<?php
/**
 * Created by PhpStorm.
 * User: Betelgeuse
 * Date: 15/03/2019
 * Time: 16:48
 */
include_once('banco.php');
class ModelProduto{
    private $conexao;
    public function __construct(){
        $this->conexao = Banco::getInstance();
    }

    public function getAll($query='select p.idProduto,p.nome, p.descricao, p.valor, p.categoria, i.caminho from produto p INNER join imagem i on p.idProduto = i.Produto_idProduto GROUP by p.idProduto')
    {
        $statement = $this->conexao->query($query);
        return $this->processResults($statement);
    }

    private function processResults($statement)
    {
        $results = array();
        if ($statement) {
            while ($row = $statement->fetchObject()) {
                array_push($results, $row);
            }
        }

        return $results;
    }

    public function retorneTodosProdutosGrid()
    {
        $arquivos = $this->getAll('select p.idProduto,p.nome, p.descricao, p.valor, p.categoria, i.caminho from produto p INNER join imagem i on p.idProduto = i.Produto_idProduto GROUP by p.idProduto');
        $t = count($arquivos);
        $con = 0;
        while ($con < $t) {
            $arquivos[$con]->caminho = $this->getAll('select i.caminho from imagem i where i.Produto_idProduto =' . $arquivos[$con]->idProduto);
            $con += 1;
        }
        $html = '';
        foreach ($arquivos as $key => $value) {
            $html = $html . '<div class="product-item ' . $value->categoria . '">
                    <div class="product product_filter">
                        <div class="product_image">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">';
            $imagQ = count($value->caminho);
            foreach ($value->caminho as $key => $value2) {
                if ($key) {
                    $html = $html . '<div class="carousel-item">
                                              <img class="d-block w-80" src="' . $value2->caminho . '" alt="First slide">
                                            </div>';
                } else {
                    $html = $html . '<div class="carousel-item active">
                                              <img class="d-block w-80" src="' . $value2->caminho . '" alt="First slide">
                                            </div>';
                }
            }
            $html = $html . '</div>
                            </div>
                        </div>
                        <div class="favorite"></div>
                        <div class="product_info">
                            <h6 class="product_name"><a href="htmlFiles/single.html">' . $value->nome . '</a></h6>
                            <div class="product_price">R$' . $value->valor . '</div>
                        </div>
                    </div>
                    <div class="red_button add_to_cart_button"><a onclick="addCarrinho('.$value->idProduto.')">add to cart</a></div>
                </div>';

        }
        return $html;
    }
}