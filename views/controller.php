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
		case 'pais':
			include_once('../model/App/ModelEndereco.php');
			$endereco=new ModelEndereco();
			$t=$endereco->getPais();
			json_encode(print_r($t)) ;
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
		default:
			break;
	}
}