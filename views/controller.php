<?php
session_start();
include_once('../model/App/ModelProduto.php');
include_once('../model/App/ModelEndereco.php');
include_once('../model/App/ModelUser.php');
include_once "../model/App/ModelCompra.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$ac=explode("?", urldecode($_SERVER["REQUEST_URI"]));
	$ac=explode("=",$ac[1]);
	switch ($ac[0]) {
		case 'produto':
			$produto=new ModelProduto();
			$t=$produto->retorneTodosProdutosGrid();
			echo $t;
			break;
		case 'logout':
			if (isset($_SESSION["user"])) {
				unset($_SESSION['user']);
			}
			header("Location: index.php");
			break;
		case 'paises':
			$endereco=new ModelEndereco();
			$t=$endereco->getPaisesS();
			echo $t;
			break;
        case 'removeProduto':
            $prod = new ModelProduto();
            $prod->removerProduto($ac[1]);
            header("Location: carrinho.php");
		default:
			break;
	}
}else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ac=explode("?", urldecode($_SERVER["REQUEST_URI"]));
	switch ($ac[1]) {
		case 'login':
			$user=new ModelUser();
			$t=$user->validaUser($_POST);
			if (isset($t)) {
				$_SESSION["user"]=$t;
				header("Location: index.php");
			}else{
				unset($_SESSION['user']);
				header("Location: login.php");
			}

			break;
		case 'message':
				var_dump($_POST);
				break;

		case 'criar':
			$user=new ModelUser();
			$t=$user->insertUser($_POST);
			if (isset($t)) {
				$_SESSION["user"]=$t;
				header("Location: ../index.php");
			}else{
				unset($_SESSION['user']);
			}
			break;
        case 'carrinho':
            if(isset($_SESSION['user'])){
                $compra = new ModelCompra();
                try{
                    echo $compra->insertCarrinho($_POST['item']);
                }catch (\Exception $e){
                    echo $e;
                }
            }else{
                echo "Precisa estar logado para guardar, maluco";
            }
            break;
        case 'quantidade':
            $produto = new ModelProduto();
            $produto->updateQuantidade($_POST['prod'], $_POST['valor']);
		default:
			break;
	}
}
