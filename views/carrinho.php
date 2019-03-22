<?php
/**
 * Created by PhpStorm.
 * User: Betelgeuse
 * Date: 22/03/2019
 * Time: 11:52
 */
include 'header.php';
include 'navbar.php';
include_once "../model/App/ModelCompra.php";
include_once "../model/App/ModelProduto.php";
$mProduto = new ModelProduto();
$mCompra = new ModelCompra();
$arrProdutos = $mCompra->getCarrinho();
echo "<div style='padding-top: 100px'>";
echo "
    <table class='table table-striped table-bordered'>
        <thead>
            <tr>
          <th scope=\"col\"></th>
          <th scope=\"col\">Nome</th>
          <th scope=\"col\">Descrição</th>
          <th scope=\"col\">Valor</th>
          <th scope=\"col\">Quantidade</th>
          <th scope=\"col\">Remover <br>produto</th>
        </tr>
      </thead>
      <tbody>
    ";
foreach ($arrProdutos as $p){
    $produto = $mProduto->getProduto($p['Produto_idProduto']);
    echo '
        <tr>
            <td>
           <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">';
                    $imagQ = count($produto);
                    foreach ($produto as $key => $value2) {
                       if ($key) {
                            echo '<div class="carousel-item">
                                                      <img class="d-block w-80" style="height:10vw;" src="' . $value2->caminho . '" alt="First slide">
                                                    </div>';
                        } else {
                            echo'<div class="carousel-item active">
                                                      <img class="d-block w-80" style="height:10vw;" src="' . $value2->caminho . '" alt="First slide">
                                                    </div>';
                        }
                    }
echo '
                </div>
            </div>
    </td>
            <td>'.$produto[0]->nome.'</td>
            <td>'.$produto[0]->descricao.'</td>
            <td>'.$produto[0]->valor.'</td>
            <td><input id="quant" onchange="updateQuant('.$produto[0]->idProduto.',this.value)" type="number" value="'.$produto[0]->quantidade.'" step="1"/></td>
            <td><a class="btn btn-danger" onclick="removeItem('.$produto[0]->idProduto.')" href="controller.php?removeProduto='.$produto[0]->idProduto.'">X</a></td>

        </tr>
    ';
}

echo "
    </tbody>
    </table> 
    <br>
    <button class='btn btn-primary'> Finalizar compra </button>
    ";
echo '</div>';
include "footer.php";
?>
