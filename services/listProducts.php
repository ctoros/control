<?php

include("producto.php");

$product = new Producto();
$productss = Array();
$products = Array();
$productss = $product->listProduc();


echo json_encode($productss);
?>
