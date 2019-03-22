<?php
/**
 * Created by PhpStorm.
 * User: Betelgeuse
 * Date: 22/03/2019
 * Time: 11:52
 */
include 'header.php';
//include 'navbar.php';
include "../model/App/ModelProduto.php";
$mProduto = new ModelProduto();
$prod = $mProduto->getAll();
foreach ($prod as $p){

}




include "footer.php";
?>
