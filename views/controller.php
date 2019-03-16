<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	include_once('../model/App/ModelProduto.php');
	$produto=new ModelProduto();
	$t=$produto->retorneTodosProdutosGrid();
	echo $t;
}