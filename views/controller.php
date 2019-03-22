<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$ac=explode("?", urldecode($_SERVER["REQUEST_URI"]));
	switch ($ac[1]) {
		case 'produto':
			include_once('../model/App/ModelProduto.php');
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
			include_once('../model/App/ModelEndereco.php');
			$endereco=new ModelEndereco();
			$t=$endereco->getPaisesS();
			echo $t;
			break;
		default:
			break;
	}
}else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ac=explode("?", urldecode($_SERVER["REQUEST_URI"]));
	switch ($ac[1]) {
		case 'login':
			include_once('../model/App/ModelUser.php');
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
		case 'criar':
			include_once('../model/App/ModelUser.php');
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
            include_once "../model/App/ModelCompra.php";
            $compra = new ModelCompra();
            echo $compra->insertCarrinho($_POST['item']);
            /*if(isset($_SESSION['user'])){
                if($_POST['item']){

                }
            }*/
            break;
		default:
			break;
	}
}